<?php

require __DIR__ . '/../vendor/autoload.php';

$api = new \Mateodioev\WhatsappApi\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Mateodioev\WhatsappApi\Messages($api);

$res = $message->to('my number')
    ->sendText('Hello world');

var_dump($res);

