<?php
/**
* @file Client.php
* @brief 将client与node映射
* @author PiHiZi <pihizi@msn.com>
* @version 0.1.0
* @date 2016-07-07
 */

namespace Gini\ORM;

class Client extends Object
{
    // gapper info
    public $client_id = 'string:40';
    // gapper info
    public $url = 'string:120';
    // gapper info
    public $api = 'string:120';
    public $node = 'object:node';

    protected static $db_index = [
        'unique:client_id',
    ];
}
