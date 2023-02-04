<?php

namespace Mateodioev\WhatsappApi\Objects;

class Text implements ObjectInterface
{
    public string $body;
    public bool $preview_url = true;

    public static function new(): static
    {
        return new static();
    }

    public function get(): array
    {
        return [
            'body' => $this->body,
            'preview_url' => $this->preview_url
        ];
    }

    public function setBody(string $body): Text
    {
        $this->body = $body;
        return $this;
    }

    public function setPreviewUrl(bool $preview_url): Text
    {
        $this->preview_url = $preview_url;
        return $this;
    }
}