<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

$params=[
    'index'=>'my_index',
//    不设置的话默认是_doc，如果设置的话'type'=>'my_type',无法查询，因为版本快把这个删了
// 'type'=>'_doc',
//'type'=>'my_type',
    'id'=>'my_id'
];
$client=ClientBuilder::create()->build();
$response=$client->get($params);
print_r($response);
/*
 * 响应数据包含一些元数据（如 index，type 等）
 * 和 _source 属性， 这是你发送给 Elasticsearch 的原始文档数据。
 */