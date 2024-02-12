<?php

use \Mateodioev\WhatsappApi;

require __DIR__ . '/../vendor/autoload.php';

$api = new WhatsappApi\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new WhatsappApi\Messages($api);

$contact = WhatsappApi\Objects\Contacts::new()
    ->setName(
        WhatsappApi\Objects\Name::new()
            ->setFormattedName('Mr. Name...')
            ->setPrefix('Mr')
    )
    ->setAddresses([
        WhatsappApi\Objects\Address::new()
            ->setType(WhatsappApi\Types\AddressType::HOME)
            ->setStreet('St Main Street')
            ->setCity('New York')
            ->setState('NY')
            ->setCountryCode('US')
    ])
    ->setEmails([
        WhatsappApi\Objects\Email::new()
            ->setType(WhatsappApi\Types\EmailType::HOME)
            ->setEmail('name@email.com'),
        WhatsappApi\Objects\Email::new()
            ->setType(WhatsappApi\Types\EmailType::WORK)
            ->setEmail('name@work.com')
    ]);

$res = $message->to('my number')
    ->sendContact([$contact]);

var_dump($res);

