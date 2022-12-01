<?php

use Mateodioev\WhatsappApi\{Api, Messages};

require __DIR__ . '/vendor/autoload.php';


$token = "your token";
$api = new Api($token, 11111111111);

$msg = new Messages($api);

$msg->to('51xxxxxxxxx');

var_dump($msg->sendText('Hola', true));
