<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

$client=ClientBuilder::create()->build();
/*
 * 现在要添加一个索引，同时要进行自定义 settings：
 *
 */
$params=[
    'index'=>'t1',
    'body'=>[
        'settings'=>[
            'number_of_shards'=>2,
            'number_of_replicas'=>0
        ]
    ]
];
/*
 * Elasticsearch会创建一个索引，并配置你指定的参数值，然后返回一个消息确认：
 */
$response=$client->indices()->create($params);
print_r($response);