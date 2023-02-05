<?php

require __DIR__ . '/../vendor/autoload.php';

$api = new \Mateodioev\WhatsappApi\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Mateodioev\WhatsappApi\Messages($api);

$contact = \Mateodioev\WhatsappApi\Objects\Contacts::new()
    ->setName(\Mateodioev\WhatsappApi\Objects\Name::new()
        ->setFormattedName('Mr. Name...')
        ->setPrefix('Mr')
    )
    ->setAddresses([
        \Mateodioev\WhatsappApi\Objects\Address::new()
            ->setType(\Mateodioev\WhatsappApi\Types\AddressType::HOME)
            ->setStreet('St Main Street')
            ->setCity('New York')
            ->setState('NY')
            ->setCountryCode('US')
    ])
    ->setEmails([
        \Mateodioev\WhatsappApi\Objects\Email::new()
            ->setType(\Mateodioev\WhatsappApi\Types\EmailType::HOME)
            ->setEmail('name@email.com'),
        \Mateodioev\WhatsappApi\Objects\Email::new()
            ->setType(\Mateodioev\WhatsappApi\Types\EmailType::WORK)
            ->setEmail('name@work.com')
    ]);

$res = $message->to('my number')
    ->sendContact([$contact]);

var_dump($res);

