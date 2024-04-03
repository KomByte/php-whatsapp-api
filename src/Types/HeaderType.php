<?php

namespace Kombyte\Whatsapp\Types;

enum HeaderType implements TypeInterface {
    case TEXT;
    case VIDEO;
    case IMAGE;
    case DOCUMENT;

    public function getType(): string
    {
        return \strtolower($this->name);
    }
}
