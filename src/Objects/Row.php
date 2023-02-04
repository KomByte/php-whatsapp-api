<?php

namespace Mateodioev\WhatsappApi\Objects;

use Mateodioev\Utils\Arrays;

class Row extends abstractObject implements ObjectInterface
{
    public string $id;
    public string $title;
    public string $description = '';

    /**
     * @inheritDoc
     */
    public static function new(): static
    {
        return new static();
    }

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function get(): array
    {
        $properties = $this->getProperties();
        return Arrays::DeleteEmptyKeys($properties);
    }

    public function setId(string $id): Row
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): Row
    {
        $this->title = $title;
        return $this;

    }

    public function setDescription(string $description): Row
    {
        $this->description = $description;
        return $this;

    }
}