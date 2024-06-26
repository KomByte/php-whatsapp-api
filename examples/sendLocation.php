<?php

use Kombyte\Whatsapp\Objects\Location;

require __DIR__ . '/../vendor/autoload.php';

$api = new \Kombyte\Whatsapp\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Kombyte\Whatsapp\Messages($api);

$location = Location::new ()
    ->setLatitude(38.8936708)
    ->setLongitude(-77.1546602)
    ->setName('Washington National Cathedral')
    ->setAddress('3101 Wisconsin Ave NW, Washington, DC 20016, Estados Unidos');

$res = $message->to('my number')
    ->sendLocation($location);

var_dump($res);
