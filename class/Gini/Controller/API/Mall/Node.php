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
        $nodes = those('node')->orderBy('id', 'asc');
        $result = [];
        foreach ($nodes as $node) {
            $result[$node->name] = [
                'title'=> $node->title,
                'client_id'=> $node->client_id,
                'url'=> $node->url
            ];
        }
		return $result;
	}

	public function actionGetScopes()
	{
		$scopes = \Gini\Config::get('mall.scopes');
		return $scopes;
	}
}
