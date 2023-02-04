<?php

namespace Mateodioev\WhatsappApi\Objects;

use Mateodioev\WhatsappApi\Types\ComponentType;

class Components extends abstractObject implements ObjectInterface
{
    public string $type;

    /**
     * @var Parameter[]
     */
    public array $parameters = [];

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
        return $this->getProperties();
    }

    public function setType(ComponentType $type): Components
    {
        $this->type = $type->getType();
        return $this;
    }

    public function setParameters(array $parameters): Components
    {
        $this->parameters = $parameters;
        return $this;
    }
}