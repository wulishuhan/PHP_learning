<?php

use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

/*
 * 索引一个文档
 * */
/*
 * 为了索引一个文档，我们要指定4部分信息：index，type，id 和一个 body。
 * 构建一个键值对的关联数组就可以完成上面的内容。body 的键值对格式与文档的数据保持一致性。
 * （译者注：如 ["testField" ⇒ "abc"] 在文档中则为 {"testField" : "abc"}）：
 */
$client=ClientBuilder::create()->build();
$params=[
    'index'=>'my_index',
    'type'=>'my_index',
    'id'=>'my_id',
    'body'=>['testField'=>'abc']
];
$response=$client->index($params);
print_r($response);
/*
 * 收到的响应数据表明，你指定的索引中已经创建好了文档。
 * 响应数据是一个关联数组，里面的内容是 Elasticsearch 返回的decoded JSON 数据：
 */