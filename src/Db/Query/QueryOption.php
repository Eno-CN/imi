<?php
namespace Imi\Db\Query;

class QueryOption
{
	/**
	 * 表名
	 * @var \Imi\Db\Query\Interfaces\ITable
	 */
	public $table;

	/**
	 * distinct
	 * @var boolean
	 */
	public $distinct = false;

	/**
	 * 查询字段
	 * @var array
	 */
	public $field = [];

	/**
	 * where 条件
	 * @var \Imi\Db\Query\Interfaces\IBaseWhere[]
	 */
	public $where = [];

	/**
	 * join
	 * @var \Imi\Db\Query\Interfaces\IJoin[]
	 */
	public $join = [];

	/**
	 * order by
	 * @var \Imi\Db\Query\Interfaces\IOrder[]
	 */
	public $order = [];

	/**
	 * group by
	 * @var \Imi\Db\Query\Interfaces\IGroup[]
	 */
	public $group = [];

	/**
	 * having
	 * @var \Imi\Db\Query\Interfaces\IHaving[]
	 */
	public $having = [];

	/**
	 * 记录从第几个开始取出
	 * @var int
	 */
	public $offset;

	/**
	 * 查询几条记录
	 * @var int
	 */
	public $limit;

	public function __construct()
	{
		$this->table = new Table();
	}
}