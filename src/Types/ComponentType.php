<?php

namespace Kombyte\Whatsapp\Types;

enum ComponentType implements TypeInterface {
    case HEADER;
    case BODY;
    case FOOTER;

    public function getType(): string
    {
        return \strtolower($this->name);
    }
}
