<?php

namespace Kombyte\Whatsapp\Objects;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#interactive-object
 */
class Body implements ObjectInterface
{
    public string $text;

    public static function new (): static
    {
        return new static();
    }

    public function get(): array
    {
        return ['text' => $this->text];
    }

    public function setText(string $text): Body
    {
        $this->text = $text;
        return $this;
    }
}
