<?php

namespace Mateodioev\WhatsappApi\Objects;

use Mateodioev\Utils\Arrays;
use Mateodioev\WhatsappApi\Types\ParameterType;

class Parameter extends abstractObject implements ObjectInterface
{
    public string $type;
    public ?string $text = null;
    public ?Currency $currency = null;
    public ?DateTime $date_time = null;
    public ?Media $image = null;
    public ?Media $document = null;
    public ?Media $video = null;

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

    /**
     * Call this optionally, type is auto set when call a set parameter
     */
    public function setType(ParameterType $type): Parameter
    {
        $this->type = $type->getType();
        return $this;
    }

    public function setText(?string $text): Parameter
    {
        $this->setType(ParameterType::TEXT);
        $this->text = $text;
        return $this;
    }

    public function setCurrency(?Currency $currency): Parameter
    {
        $this->setType(ParameterType::CURRENCY);
        $this->currency = $currency;
        return $this;
    }

    public function setDateTime(?DateTime $date_time): Parameter
    {
        $this->setType(ParameterType::DATE_TIME);
        $this->date_time = $date_time;
        return $this;
    }

    public function setImage(?Media $image): Parameter
    {
        $this->setType(ParameterType::IMAGE);
        $this->image = $image;
        return $this;
    }

    public function setDocument(?Media $document): Parameter
    {
        $this->setType(ParameterType::DOCUMENT);
        $this->document = $document;
        return $this;
    }

    public function setVideo(?Media $video): Parameter
    {
        $this->setType(ParameterType::VIDEO);
        $this->video = $video;
        return $this;
    }
}