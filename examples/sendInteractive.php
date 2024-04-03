<?php

use Kombyte\Whatsapp\Objects\Action;
use Kombyte\Whatsapp\Objects\Body;
use Kombyte\Whatsapp\Objects\Footer;
use Kombyte\Whatsapp\Objects\Header;
use Kombyte\Whatsapp\Objects\Interactive;
use Kombyte\Whatsapp\Objects\Row;
use Kombyte\Whatsapp\Objects\Section;
use Kombyte\Whatsapp\Types\InteractiveType;

require __DIR__ . '/../vendor/autoload.php';

$api = new \Kombyte\Whatsapp\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);
$message = new \Kombyte\Whatsapp\Messages($api);

$interactive = Interactive::new ()
    ->setType(InteractiveType::LIST)
    ->setHeader(Header::new ()->setText('Hello world'))
    ->setBody(Body::new ()->setText('Welcome to Mateodioev/WhatsappApi v1'))
    ->setFooter(Footer::new ()->setText('Search @Mateodioev on Github.com'))
// Required
    ->setAction(
        Action::new ()
            ->setButton('Continue')
            ->setSections([
                Section::new ()
                    ->setTitle('Next page')
                    ->setRows([
                        Row::new ()
                            ->setId('my_id')
                            ->setTitle('My title')
                            ->setDescription('Button 1, section 1 description'),
                    ]),
            ])
    );

$res = $message->to('my number')
    ->sendInteractive($interactive);

var_dump($res);
