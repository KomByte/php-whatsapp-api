<?php

namespace Kombyte\Whatsapp\Objects;

/**
 * https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#location-object
 */
class Location extends abstractObject implements ObjectInterface
{
    public float|int $longitude;
    public float|int $latitude;
    public string $name    = '';
    public string $address = '';

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

    public function setLongitude(float | int $longitude): Location
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function setLatitude(float | int $latitude): Location
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function setName(string $name): Location
    {
        $this->name = $name;
        return $this;
    }

    public function setAddress(string $address): Location
    {
        $this->address = $address;
        return $this;
    }
}
