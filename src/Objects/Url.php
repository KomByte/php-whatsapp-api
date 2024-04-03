<?php

namespace Kombyte\Whatsapp\Objects;

use Kombyte\Whatsapp\Types\UrlType;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Url extends abstractObject implements ObjectInterface
{
    public string $url;
    public string $type;

    /**
     * @inheritDoc
     */
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
        return $this->getProperties();
    }

    public function setUrl(string $url): Url
    {
        $this->url = $url;
        return $this;
    }

    public function setType(UrlType $type): Url
    {
        $this->type = $type->getType();
        return $this;
    }
}
