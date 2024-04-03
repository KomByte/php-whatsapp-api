<?php

namespace Kombyte\Whatsapp\Objects;

use Mateodioev\Utils\Arrays;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#template-object
 */
class Template extends abstractObject implements ObjectInterface
{
    public string $namespace = '';
    public string $name;
    public Language $language;
    public ?array $components = null;

    public static function new (): static
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

    public function setNamespace(string $namespace): Template
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function setName(string $name): Template
    {
        $this->name = $name;
        return $this;
    }

    public function setLanguage(Language $language): Template
    {
        $this->language = $language;
        return $this;
    }

    public function setComponents(?array $components): Template
    {
        $this->components = $components;
        return $this;
    }
}
