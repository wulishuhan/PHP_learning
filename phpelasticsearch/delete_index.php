<?php
require 'vendor/autoload.php';
use Elasticsearch\ClientBuilder;

$deleteParams=[
    'index'=>'my_index',
    'id'=>'my_id'
];
$client=ClientBuilder::create()->build();
$response=$client->delete($deleteParams);
print_r($deleteParams);