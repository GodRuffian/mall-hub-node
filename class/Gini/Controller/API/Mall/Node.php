<?php
/**
* @file Node.php
* @brief 为mall-vendor/lab-orders/mall-old等app提供API
* @author Jinlin Li <jinlin.li@geneegroup.com>
* @version 0.1.0
* @date 2015-07-06
 */

namespace Gini\Controller\API\Mall;

/**
 * @brief 继承自Gini\Controller\API\Base
 */
class Node extends \Gini\Controller\API\Base
{
	/**
	 * getNodes 获得所有销售节点
	 */
	public function actionGetNodes()
	{
		$nodes = \Gini\Config::get('mall.node');
		return $nodes;
	}
}