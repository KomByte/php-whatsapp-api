<?php

namespace Kombyte\Whatsapp\Objects;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Org extends abstractObject implements ObjectInterface
{
    public string $company    = '';
    public string $department = '';
    public string $title      = '';

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
        return $this->getProperties();
    }

    public function setCompany(string $company): Org
    {
        $this->company = $company;
        return $this;
    }

    public function setDepartment(string $department): Org
    {
        $this->department = $department;
        return $this;
    }

    public function setTitle(string $title): Org
    {
        $this->title = $title;
        return $this;
    }
}
