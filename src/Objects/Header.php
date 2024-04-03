<?php

namespace Kombyte\Whatsapp\Objects;

use Kombyte\Whatsapp\Types\HeaderType;
use Mateodioev\Utils\Arrays;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#header-object
 */
class Header extends abstractObject implements ObjectInterface
{
    public string $type;
    public ?Media $document = null;
    public ?Media $image    = null;
    public ?string $text    = null;
    public ?Media $video    = null;

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
        $properties = $this->getProperties();
        return Arrays::DeleteEmptyKeys($properties);
    }

    /**
     * Call this optionally, type is auto set when call a set Media
     */
    public function setType(HeaderType $type): Header
    {
        $this->type = $type->getType();
        return $this;
    }

    public function setDocument(?Media $document): Header
    {
        $this->setType(HeaderType::DOCUMENT);
        $this->document = $document;
        return $this;
    }

    public function setImage(?Media $image): Header
    {
        $this->setType(HeaderType::IMAGE);
        $this->image = $image;
        return $this;
    }

    public function setText(?string $text): Header
    {
        $this->setType(HeaderType::TEXT);
        $this->text = $text;
        return $this;
    }

    public function setVideo(?Media $video): Header
    {
        $this->setType(HeaderType::VIDEO);
        $this->video = $video;
        return $this;
    }
}
