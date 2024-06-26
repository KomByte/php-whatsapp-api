<?php

namespace Kombyte\Whatsapp\Objects;

interface ObjectInterface
{
    /**
     * Create new instance
     */
    public static function new (): static;

    /**
     * Get values as array
     */
    public function get(): array;
}
