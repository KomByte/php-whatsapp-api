<?php

namespace Mateodioev\WhatsappApi\Types;

enum InteractiveType implements TypeInterface
{
    case BUTTON;
    case LIST;
    case PRODUCT;
    case PRODUCT_LIST;

    public function getType(): string
    {
        return \strtolower($this->name);
    }
}
