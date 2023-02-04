<?php

namespace Mateodioev\WhatsappApi\Types;

enum PhoneType implements TypeInterface
{
    case CELL;
    case MAIN;
    case IPHONE;
    case HOME;
    case WORK;

    public function getType(): string
    {
        return $this->name;
    }
}
