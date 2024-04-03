<?php

namespace Kombyte\Whatsapp\Objects;

class DateTime implements ObjectInterface
{
    public string $fallback_value;
    /**
     * @inheritDoc
     */
    public static function new (): static
    {
        return new static();
    }

    /**
     * @inheritDoc
     */
    public function get(): array
    {
        return [];
    }
}
