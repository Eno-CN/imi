<?php

declare(strict_types=1);

namespace Imi\Log;

use Imi\App;
use Imi\Bean\Annotation\Bean;
use Imi\Config;
use Imi\Util\ClassObject;
use InvalidArgumentException;
use Monolog\Handler\FormattableHandlerInterface;
use Monolog\Logger as MonoLogger;

/**
 * @Bean("Logger")
 */
class Logger
{
    /**
     * @var MonoLogger[]
     */
    private array $loggers = [];

    /**
     * @return MonoLogger[]
     */
    public function getLoggers(bool $initAll = false): array
    {
        if ($initAll)
        {
            foreach (Config::get('@app.logger.channels', []) as $channelName => $_)
            {
                $this->getLogger($channelName);
            }
        }

        return $this->loggers;
    }

    public function getLogger(?string $channelName = null): MonoLogger
    {
        $config = Config::get('@app.logger', []);
        $channelsConfig = $config['channels'] ?? [];
        if (null === $channelName)
        {
            $channelName = $config['default'] ?? 'imi';
        }
        if (!isset($this->loggers[$channelName]))
        {
            if (!isset($channelsConfig[$channelName]))
            {
                throw new InvalidArgumentException(sprintf('Logger %s not found', $channelName));
            }
            $channelConfig = $channelsConfig[$channelName];
            $logger = $this->loggers[$channelName] = new MonoLogger($channelName);
            $handlers = [];
            $appType = App::getApp()->getType();
            foreach ($channelConfig['handlers'] ?? [] as $handlerConfig)
            {
                if (!isset($handlerConfig['class']))
                {
                    throw new InvalidArgumentException('Logger handler must have class');
                }
                if (isset($handlerConfig['env']))
                {
                    if (!\in_array($appType, $handlerConfig['env']))
                    {
                        continue;
                    }
                }
                $handler = $handlers[] = ClassObject::newInstance($handlerConfig['class'], $handlerConfig['construct'] ?? []);
                if (isset($handlerConfig['formatter']) && $handler instanceof FormattableHandlerInterface)
                {
                    $formatterConfig = $handlerConfig['formatter'];
                    $formatter = ClassObject::newInstance($formatterConfig['class'], $formatterConfig['construct'] ?? []);
                    $handler->setFormatter($formatter);
                }
            }
            $logger->setHandlers($handlers);

            return $logger;
        }

        return $this->loggers[$channelName];
    }

    public function clear(): void
    {
        $this->loggers = [];
    }
}
