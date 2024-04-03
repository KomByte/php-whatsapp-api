<?php

namespace Kombyte\Whatsapp\Objects;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#reaction-object
 */
class Reaction extends abstractObject implements ObjectInterface
{
    public string $message_id;
    public string $emoji;

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

    public function setMessageId(string $message_id): Reaction
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function setEmoji(string $emoji): Reaction
    {
        $this->emoji = $emoji;
        return $this;
    }
}
