<?php

use Kombyte\Whatsapp\Messages;
use PHPUnit\Framework\TestCase;

class MessagesTest extends TestCase
{
    private string $token = "your token";

    public function testSendText()
    {
        $api = new Messages(new \Kombyte\Whatsapp\Api($this->token, 111111111111111111));

        $result = $api->sendText('Hola', true);

        $this->assertClassHasAttribute('messaging_product', 'stdClass');
    }
}
