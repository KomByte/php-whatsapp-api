<?php

use Mateodioev\WhatsappApi\Messages;
use PHPUnit\Framework\TestCase;

class MessagesTest extends TestCase
{
    private string $token = "your token";

    public function testSendText()
    {
        $api = new Messages(new \Mateodioev\WhatsappApi\Api($this->token, 111111111111111111));

        $result = $api->sendText('Hola', true);

        $this->assertClassHasAttribute('messaging_product', 'stdClass');
    }
}
