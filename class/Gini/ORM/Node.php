<?php
/**
* @file Node.php
* @brief 将节点的信息存储在数据库
* @author PiHiZi <pihizi@msn.com>
* @version 0.1.0
* @date 2016-07-07
 */

namespace Gini\ORM;

class Node extends Object
{
    // 名称: nankai
    public $name = 'string:30';
    // 名称: 南开大学
    public $title = 'string:30';
    public $client_id = 'string:30';
    public $client_secret = 'string:30';

    protected static $db_index = [
        'unique:name',
        'unique:client_id',
    ];
}
