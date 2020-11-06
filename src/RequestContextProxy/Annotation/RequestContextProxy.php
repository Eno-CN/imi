<?php

namespace Imi\RequestContextProxy\Annotation;

use Imi\Bean\Annotation\Base;
use Imi\Bean\Annotation\Parser;

/**
 * 请求上下文代理.
 *
 * @Annotation
 * @Target("CLASS")
 * @Parser("Imi\Bean\Parser\NullParser")
 */
class RequestContextProxy extends Base
{
    /**
     * 只传一个参数时的参数名.
     *
     * @var string
     */
    protected ?string $defaultFieldName = 'name';

    /**
     * 代理类名.
     *
     * @var string|null
     */
    public ?string $class;

    /**
     * 请求上下文中的名称.
     *
     * @var string
     */
    public string $name;
}
