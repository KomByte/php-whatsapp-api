<?php

use Mateodioev\WhatsappApi as WspApi;

require __DIR__ . '/../vendor/autoload.php';

$api = new WspApi\Api($_ENV['WHATSAPP_API'], (int) $_ENV['WHATSAPP_PHONE_ID']);

// Path to the file to upload
$target = '';
// See https://developers.facebook.com/docs/whatsapp/cloud-api/reference/media/#supported-media-types
$mime = '';

$file = new CURLFile($target);
$file->setMimeType($mime);

$media = new Media($api);
$mediaType = 'document';

$fileId = $media->upload($file, $mediaType)->id;

$messages = new WspApi\Messages($api);
$messages->to('You phone number with country code')
    ->sendMedia($mediaType, $fileId, 'My caption');
