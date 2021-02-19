<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;


$params=[
    'index'=>'my_index',
    'type'=>'my_type',
    'body'=>[
        'query'=>[
            'match'=>[
                'testField'=>'abc'
            ]
        ]
    ]
];

$client=ClientBuilder::create()->build();
$response=$client->search($params);
print_r($response);
