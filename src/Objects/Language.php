<?php

namespace Kombyte\Whatsapp\Objects;

class Language implements ObjectInterface
{
    public string $code;

    public static function new (): static
    {
        return new static();
    }

    public function get(): array
    {
        return ['code' => $this->code];
    }

    public function setCode(string $code): Language
    {
        $this->code = $code;
        return $this;
    }
}
