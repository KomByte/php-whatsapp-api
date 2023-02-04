<?php

namespace Mateodioev\WhatsappApi\Objects;

use Mateodioev\WhatsappApi\Types\AddressType;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Address extends abstractObject implements ObjectInterface
{
    public string $street = '';
    public string $city = '';
    public string $state = '';
    public string $zip = '';
    public string $country = '';
    public string $country_code = '';
    public string $type = '';

    /**
     * @throws \ReflectionException
     */
    public function get(): array
    {
        return $this->getProperties();
    }

    public static function new(): static
    {
        return new static();
    }

    /**
     * Street number and name
     */
    public function setStreet(string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * City name
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * State abbreviation
     */
    public function setState(string $state): Address
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Zip code
     */
    public function setZip(string $zip): Address
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Full country name
     */
    public function setCountry(string $country): Address
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Two-letter country abbreviation
     */
    public function setCountryCode(string $country_code): Address
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * Standard values are HOME and WORK.
     */
    public function setType(AddressType $type): Address
    {
        $this->type = $type->getType();
        return $this;
    }
}