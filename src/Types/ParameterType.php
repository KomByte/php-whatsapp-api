<?php

namespace Kombyte\Whatsapp\Types;

enum ParameterType implements TypeInterface {
    case CURRENCY;
    case DATE_TIME;
    case DOCUMENT;
    case IMAGE;
    case TEXT;
    case VIDEO;

    public function getType(): string
    {
        return \strtolower($this->name);
    }
}
