<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;
/*
 * 你会注意到删除文档的语法与获取文档的语法是一样的。
 * 唯一不同的是 delete 方法替代了 get 方法。下面响应数据代表文档已被删除：
 * */
$params=[
    'index'=>'my_index',
  //  'type'=>'my_type',
    'id'=>'my_id'
];
$client=ClientBuilder::create()->build();
$response=$client->delete($params);
print_r($response);
