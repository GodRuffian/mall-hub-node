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
                'number'=> $node->number
            ];
        }
		return $result;
	}

	public function actionGetScopes()
	{
		$scopes = \Gini\Config::get('mall.scopes');
		return $scopes;
    }

    public function actionGetNode(array $criteria)
    {
        $result = [];

        $clientID = $criteria['client_id'];
        if (!$clientID) return $result;

        $client = a('client', ['client_id'=>$clientID]);
        if (!$client->id) return $result;

        $result = [
            'name'=> $client->node->name,
            'title'=> $client->node->title,
            'number'=> $client->node->number,
            'client_id'=> $client->client_id,
            'url'=> $client->url,
            'api'=> $client->api,
        ];
        return $result;
    }
}
