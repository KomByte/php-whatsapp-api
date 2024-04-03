<?php

use Kombyte\Whatsapp;

require __DIR__ . '/../vendor/autoload.php';

$api = new Whatsapp\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new Whatsapp\Messages($api);

$contact = Whatsapp\Objects\Contacts::new ()
    ->setName(
        Whatsapp\Objects\Name::new ()
            ->setFormattedName('Mr. Name...')
            ->setPrefix('Mr')
    )
    ->setAddresses([
        Whatsapp\Objects\Address::new ()
            ->setType(Whatsapp\Types\AddressType::HOME)
            ->setStreet('St Main Street')
            ->setCity('New York')
            ->setState('NY')
            ->setCountryCode('US'),
    ])
    ->setEmails([
        Whatsapp\Objects\Email::new ()
            ->setType(Whatsapp\Types\EmailType::HOME)
            ->setEmail('name@email.com'),
        Whatsapp\Objects\Email::new ()
            ->setType(Whatsapp\Types\EmailType::WORK)
            ->setEmail('name@work.com'),
    ]);

$res = $message->to('my number')
    ->sendContact([$contact]);

var_dump($res);
