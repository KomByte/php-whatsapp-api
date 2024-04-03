<?php

namespace Kombyte\Whatsapp;

class Media
{
    public function __construct(protected Api $api)
    {
    }

    /**
     * All media files sent through this endpoint are encrypted and persist for 30 days, unless they are deleted earlier.
     * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/media/#supported-media-types For supported media types
     */
    public function upload(\CURLFile $file, string $type): \stdClass
    {
        return $this->api->addOpt([
            'type' => $type,
            'file' => $file,
        ])->send('media');
    }
}
