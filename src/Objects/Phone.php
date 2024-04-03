<?php

namespace Kombyte\Whatsapp\Objects;

use Kombyte\Whatsapp\Types\PhoneType;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Phone extends abstractObject implements ObjectInterface
{
    public string $phone = '';
    public string $type  = '';
    public string $wa_id = '';

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

    public function setPhone(string $phone): Phone
    {
        $this->phone = $phone;
        return $this;
    }

    public function setType(PhoneType $type): Phone
    {
        $this->type = $type->getType();
        return $this;
    }

    public function setWaId(string $wa_id): Phone
    {
        $this->wa_id = $wa_id;
        return $this;
    }

}
