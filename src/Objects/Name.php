<?php

namespace Mateodioev\WhatsappApi\Objects;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Name extends abstractObject implements ObjectInterface
{
    public string $formatted_name;
    public string $first_name = '';
    public string $last_name = '';
    public string $middle_name = '';
    public string $suffix = '';
    public string $prefix = '';

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
        return $this->getProperties();
    }

    /**
     * Full name, as it normally appears.
     */
    public function setFormattedName(string $formatted_name): Name
    {
        $this->formatted_name = $formatted_name;
        return $this;
    }

    public function setFirstName(string $first_name): Name
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function setLastName(string $last_name): Name
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function setMiddleName(string $middle_name): Name
    {
        $this->middle_name = $middle_name;
        return $this;
    }

    public function setPrefix(string $prefix): Name
    {
        $this->prefix = $prefix;
        return $this;
    }
}