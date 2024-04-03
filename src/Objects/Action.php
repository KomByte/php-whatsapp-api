<?php

namespace Kombyte\Whatsapp\Objects;

use Mateodioev\Utils\Arrays;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#action-object
 */
class Action extends abstractObject implements ObjectInterface
{
    public string $button = '';
    /**
     * @var Buttons[]
     */
    public array $buttons              = [];
    public string $catalog_id          = '';
    public string $product_retailer_id = '';
    /**
     * @var Section[]
     */
    public array $sections = [];

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

    public function setButton(string $button): Action
    {
        $this->button = $button;
        return $this;
    }

    public function setButtons(array $buttons): Action
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function setCatalogId(string $catalog_id): Action
    {
        $this->catalog_id = $catalog_id;
        return $this;
    }

    public function setProductRetailerId(string $product_retailer_id): Action
    {
        $this->product_retailer_id = $product_retailer_id;
        return $this;
    }

    public function setSections(array $sections): Action
    {
        $this->sections = $sections;
        return $this;
    }
}
