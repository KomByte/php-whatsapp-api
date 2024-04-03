<?php

namespace Kombyte\Whatsapp\Objects;

use Mateodioev\Utils\Arrays;

class Section extends abstractObject implements ObjectInterface
{
    /**
     * @var Product[] Array of product objects
     */
    public ?array $product_items = null;
    /**
     * @var Row[]
     */
    public ?array $rows   = null;
    public ?string $title = null;

    /**
     * @inheritDoc
     */
    public static function new (): static
    {
        return new static();
    }

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function get(): array
    {
        $properties = $this->getProperties();
        return Arrays::DeleteEmptyKeys($properties);
    }

    public function setProductItems(?array $product_items): Section
    {
        $this->product_items = $product_items;
        return $this;
    }

    public function setRows(?array $rows): Section
    {
        $this->rows = $rows;
        return $this;
    }

    public function setTitle(?string $title): Section
    {
        $this->title = $title;
        return $this;
    }
}
