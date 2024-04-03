<?php

namespace Kombyte\Whatsapp\Objects;

abstract class abstractObject
{
    /**
     * Get properties from object
     * @throws \ReflectionException
     */
    public function getProperties(?int $filters = \ReflectionProperty::IS_PUBLIC): array
    {
        $obj = new \ReflectionClass($this);

        $params     = [];
        $properties = $obj->getProperties($filters);

        foreach ($properties as $property) {
            $key   = $property->getName();
            $value = $obj->getProperty($key)->getValue($this);

            if ($value instanceof ObjectInterface) {
                $value = $value->get();
            }

            $params[$key] = $value;
        }

        return $params;
    }
}
