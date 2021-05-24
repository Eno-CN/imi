<?php

declare(strict_types=1);

namespace Imi\Model\Annotation\Relation;

use Imi\Bean\Annotation\Parser;

/**
 * 用于多态多对多关联被关联的模型中使用，查询对应的左侧模型列表.
 *
 * @Annotation
 * @Target("PROPERTY")
 * @Parser("Imi\Bean\Parser\NullParser")
 */
#[\Attribute]
class PolymorphicToMany extends RelationBase
{
    /**
     * 只传一个参数时的参数名.
     */
    protected ?string $defaultFieldName = 'model';

    /**
     * 关联的模型类
     * 可以是包含命名空间的完整类名
     * 可以同命名空间下的类名.
     */
    public string $model = '';

    /**
     * 关联的模型用于关联的字段.
     */
    public string $modelField = '';

    /**
     * 当前模型用于关联的字段.
     */
    public string $field = '';

    /**
     * 多态类型字段名.
     */
    public string $type = '';

    /**
     * 多态类型字段值
     *
     * @var mixed
     */
    public $typeValue;

    /**
     * 中间表模型
     * 可以是包含命名空间的完整类名
     * 可以同命名空间下的类名.
     */
    public string $middle = '';

    /**
     * 排序规则字符串.
     *
     * 例：age desc, id desc
     */
    public ?string $order = null;

    /**
     * 为查询出来的模型指定字段.
     *
     * @var string[]|null
     */
    public ?array $fields = null;

    public function __construct(?array $__data = null, string $model = '', string $modelField = '', string $field = '', string $type = '', string $middle = '', ?string $order = null, ?array $fields = null)
    {
        parent::__construct(...\func_get_args());
    }
}
