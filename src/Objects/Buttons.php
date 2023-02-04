<?php

namespace Mateodioev\WhatsappApi\Objects;

class Buttons extends abstractObject implements ObjectInterface
{
    /**
     * @var string only supported type is reply (for Reply Button)
     */
    public string $type = 'reply';
    public string $title;
    public string $id;

    public static function new(): static
    {
        return new static();
    }

    /**
     * @inheritDoc
     * @throws \ReflectionException
     */
    public function get(): array
    {
        return [
            'type' => $this->type,
            $this->type => [
                'id' => $this->id,
                'title' => $this->title
            ]
        ];
    }

    public function setTitle(string $title): Buttons
    {
        $this->title = $title;
        return $this;
    }

    public function setId(string $id): Buttons
    {
        $this->id = $id;
        return $this;
    }
}