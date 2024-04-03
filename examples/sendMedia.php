<?php

require __DIR__ . '/../vendor/autoload.php';

$api = new \Kombyte\Whatsapp\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Kombyte\Whatsapp\Messages($api);

$res = $message->to('my number')
    ->sendMedia('image', 'https://avatars.githubusercontent.com/u/68271130?v=4', 'My caption');

var_dump($res);
