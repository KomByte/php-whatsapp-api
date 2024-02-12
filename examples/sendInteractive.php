<?php

use Mateodioev\WhatsappApi\Objects\{Action, Body, Footer, Header, Interactive, Row, Section};
use Mateodioev\WhatsappApi\Types\InteractiveType;

require __DIR__ . '/../vendor/autoload.php';

$api = new \Mateodioev\WhatsappApi\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Mateodioev\WhatsappApi\Messages($api);

$interactive = Interactive::new()
    ->setType(InteractiveType::LIST )
    ->setHeader(Header::new()->setText('Hello world'))
    ->setBody(Body::new()->setText('Welcome to Mateodioev/WhatsappApi v1'))
    ->setFooter(Footer::new()->setText('Search @Mateodioev on Github.com'))
    // Required
    ->setAction(
        Action::new()
            ->setButton('Continue')
            ->setSections([
                Section::new()
                    ->setTitle('Next page')
                    ->setRows([
                        Row::new()
                            ->setId('my_id')
                            ->setTitle('My title')
                            ->setDescription('Button 1, section 1 description')
                    ])
            ])
    );

$res = $message->to('my number')
    ->sendInteractive($interactive);

var_dump($res);

