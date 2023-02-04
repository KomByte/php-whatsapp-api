<?php

namespace Mateodioev\WhatsappApi\Types;

enum UrlType implements TypeInterface
{
    case HOME;
    case WORK;
    public function getType(): string
    {
        return $this->name;
    }
}
