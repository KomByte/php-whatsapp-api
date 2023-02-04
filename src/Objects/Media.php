<?php

namespace Mateodioev\WhatsappApi\Objects;

use Mateodioev\Utils\Arrays;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#media-object
 */
class Media extends abstractObject implements ObjectInterface
{
    public string $id = '';
    public string $link = '';
    public string $caption = '';
    public string $filename = '';
    public string $provider = '';

    public static function new(): static
    {
        return new static();
    }

    /**
     * @throws \ReflectionException
     */
    public function get(): array
    {
        $properties = $this->getProperties();
        return Arrays::DeleteEmptyKeys($properties);
    }

    public function setId(string $id): Media
    {
        $this->id = $id;
        return $this;
    }

    public function setLink(string $link): Media
    {
        $this->link = $link;
        return $this;
    }

    public function setCaption(string $caption): Media
    {
        $this->caption = $caption;
        return $this;
    }

    public function setFilename(string $filename): Media
    {
        $this->filename = $filename;
        return $this;
    }

    public function setProvider(string $provider): Media
    {
        $this->provider = $provider;
        return $this;
    }
}