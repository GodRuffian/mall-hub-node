<?php

namespace Gini\Controller\CLI\Hub\Node;

class Init extends \Gini\Controller\CLI
{
    public function actionAddNode()
    {
        $data = [];
        $data['name']  = readline('please input node name (e.g. nankai): ');
        $data['title'] = readline('please input node title (e.g. Nankai Unversity): ');
        $data = array_filter($data, function($value) {
            if (empty($value)) return false;
            return true;
        });
        if (!empty($data)) {
            if ($this->fillNode($data)) {
                echo "Done.\n";
            }
            else {
                echo "Failed.\n";
            }
        }
    }

    public function actionAddClient()
    {
        $data = [];
        $data['client_id']  = readline('please input client id (e.g. nankai): ');
        $data['api'] = readline('please input api url (e.g. http://url/api): ');
        $data['url'] = readline('please input url (e.g. http://url): ');
        $data['node'] = readline('please input node name (e.g. nankai): ');
        $data = array_filter($data, function($value) {
            if (empty($value)) return false;
            return true;
        });
        if (!empty($data)) {
            if ($this->fillClient($data)) {
                echo "Done.\n";
            }
            else {
                echo "Failed.\n";
            }
        }
    }

    public function actionRun()
    {
        $nodes =[
            [
                'name'=> 'nankai',
                'title'=> '南开大学',
            ],
            [
                'name'=> 'tust',
                'title'=> '天津科技大学',
            ],
            [
                'name'=> 'ntu',
                'title'=> '南通大学',
            ],
            [
                'name'=> 'cloud',
                'title'=> '来买云采购',
            ],
            [
                'name'=> 'demo',
                'title'=> '演示站点',
            ],
            [
                'name'=> 'njust',
                'title'=> '南京理工大学',
            ],
            [
                'name'=> 'tjutcm',
                'title'=> '天津中医药大学',
            ],
            [
                'name'=> 'ceta',
                'title'=> '中持依迪亚',
            ],
        ];
        foreach ($nodes as $node) {
            $this->fillNode($node);
        }

        $clients = [
            [
                'client_id'=> 'nankai-mall-old',
                'url'=> 'http://mall.nankai.edu.cn',
                'api'=> 'http://mall.nankai.edu.cn/api',
                'node'=> 'nankai',
            ],
            [
                'client_id'=> '6d71119981b6cfe8028341163beb1602c170606b',
                'url'=> 'http://tust.orders.labmai.com',
                'api'=> 'http://tust.labmai.com/api',
                'node'=> 'tust',
            ],
            [
                'client_id'=> '53318df47e87f8f88f1397cff2f84b6faff8c1e8',
                'url'=> 'http://ntu.op.labmai.com',
                'api'=> 'http://ntu.op.labmai.com/api',
                'node'=> 'ntu',
            ],
            [
                'client_id'=> 'njust-mall-old',
                'url'=> 'http://njust.op.labmai.com',
                'api'=> 'http://njust.op.labmai.com/api',
                'node'=> 'njust',
            ],
            [
                'client_id'=> 'tjutcm-mall-old',
                'url'=> 'http://tjutcm.op.labmai.com',
                'api'=> 'http://tjutcm.op.labmai.com/api',
                'node'=> 'tjutcm',
            ],
            [
                'client_id'=> 'cloud-mall-old',
                'url'=> 'http://cloud.nodes.labmai.com',
                'api'=> 'http://cloud.labmai.com/api',
                'node'=> 'cloud',
            ],
            [
                'client_id'=> 'demo-mall-old',
                'url'=> 'http://demo.op.labmai.com',
                'api'=> 'http://demo.op.labmai.com/api',
                'node'=> 'demo',
            ],
            [
                'client_id'=> 'ceta-mall-old',
                'url'=> 'http://ceta.op.labmai.com',
                'api'=> 'http://ceta.op.labmai.com/api',
                'node'=> 'ceta',
            ],
        ];

        foreach ($clients as $client) {
            $this->fillClient($client);
        }
    }

    private function fillNode($data)
    {
        $node = a('node', ['name'=> $data['name']]);
        if (!$node->id) {
            $node->name = $data['name'];
        }
        $node->title = $data['title'];
        $node->client_id = $data['name'];
        $node->client_secret = sha1(uniqid(true));
        return $node->save();
    }

    private function fillClient($data)
    {
        $client = a('client', ['client_id'=>$data['client_id']]);
        if (!$client->id) {
            $client->client_id = $data['client_id'];
        }
        $client->url = $data['url'];
        $client->api = $data['api'];
        $client->node = a('node', ['name'=> $data['node']]);
        return $client->save();
    }
}

