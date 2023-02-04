<?php

namespace Mateodioev\WhatsappApi\Objects;

class Product implements ObjectInterface
{
    public string $product_retailer_id;

    public static function new(): static
    {
        return new static();
    }

    public function get(): array
    {
        return ['product_retailer_id' =>  $this->product_retailer_id];
    }

    public function setProductRetailerId(string $product_retailer_id): Product
    {
        $this->product_retailer_id = $product_retailer_id;
        return $this;
    }
}