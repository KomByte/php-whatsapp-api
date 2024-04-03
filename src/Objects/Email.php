<?php

namespace Kombyte\Whatsapp\Objects;

use Kombyte\Whatsapp\Types\EmailType;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Email implements ObjectInterface
{

    public string $email = '';
    public string $type  = '';

    /**
     * @inheritDoc
     */
    public static function new (): static
    {
        // Default type is HOME
        return (new static())->setType(EmailType::HOME);
    }

    /**
     * @inheritDoc
     */
    public function get(): array
    {
        return [
            'email' => $this->email,
            'type'  => $this->type,
        ];
    }

    public function setEmail(string $email): Email
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Standard values are HOME and WORK
     */
    public function setType(EmailType $type): Email
    {
        $this->type = $type->getType();
        return $this;
    }
}
