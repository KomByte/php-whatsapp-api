<?php

namespace Kombyte\Whatsapp\Types;

enum EmailType implements TypeInterface {
    case HOME;
    case WORK;

    public function getType(): string
    {
        return $this->name;
    }
}
