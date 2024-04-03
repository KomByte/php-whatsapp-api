<?php

namespace Kombyte\Whatsapp\Objects;

use Kombyte\Whatsapp\Types\InteractiveType;
use Mateodioev\Utils\Arrays;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#interactive-object
 */
class Interactive extends abstractObject implements ObjectInterface
{
    public Action $action;
    public ?Body $body     = null;
    public ?Footer $footer = null;
    public ?Header $header = null;
    public string $type;

    /**
     * @throws \ReflectionException
     */
    public function get(): array
    {
        $properties = $this->getProperties();
        return Arrays::DeleteEmptyKeys($properties);
    }

    public static function new (): static
    {
        return new static();
    }

    public function setAction(Action $action): Interactive
    {
        $this->action = $action;
        return $this;
    }

    public function setBody(?Body $body): Interactive
    {
        $this->body = $body;
        return $this;
    }

    public function setFooter(?Footer $footer): Interactive
    {
        $this->footer = $footer;
        return $this;
    }

    public function setHeader(?Header $header): Interactive
    {
        $this->header = $header;
        return $this;
    }

    public function setType(InteractiveType $type): Interactive
    {
        $this->type = $type->getType();
        return $this;
    }
}
