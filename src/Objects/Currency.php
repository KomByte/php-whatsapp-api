<?php

namespace Kombyte\Whatsapp\Objects;

class Currency implements ObjectInterface
{

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
