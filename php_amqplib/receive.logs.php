<?php
require_once __DIR__.'/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection=new AMQPStreamConnection('localhost',5672,'admin','admin');
$channel=$connection->channel();
$channel->exchange_declare('logs','fanout',false,false,false);
list($queue_name, ,)=$channel->queue_declare("",false,false,true,false);
$channel->queue_bind($queue_name,'logs');
echo ' [*] Waiting for logs. To exit press CTRL+C',"\n";
$callback=function ($msg){
    echo '----';
    echo ' [x] ',$msg->body,"\n";
};
$channel->basic_consume($queue_name,'',false,true,false,$callback);
while(count($channel->callbacks)){
    $channel->wait();
}
$channel->close();
$channel->close();