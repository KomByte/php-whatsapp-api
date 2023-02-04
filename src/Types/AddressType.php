<?php

namespace Mateodioev\WhatsappApi\Types;

enum AddressType implements TypeInterface
{
    case HOME;
    case WORK;

    public function getType(): string
    {
        return $this->name;
    }
}