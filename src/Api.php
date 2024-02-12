<?php

namespace Mateodioev\WhatsappApi;

use Mateodioev\Request\Request;

use function sprintf;
use function json_encode;
use function array_merge;

class Api
{
    public const BASE_URL = 'https://graph.facebook.com/%s/%s/';
    public const VERSION = 'v16.0';

    public array $payload = ['messaging_product' => 'whatsapp'];
    public string $endpoint;

    public function __construct(private readonly string $token, private readonly int $phoneNumberId)
    {
    }

    public function send(string $endpoint, string $version = self::VERSION): \stdClass
    {
        $this->endpoint = sprintf(self::BASE_URL, $version, $this->phoneNumberId);

        // Use multipart/form-data if endpoint is media
        if ($endpoint === 'media') {
            $contentType = 'multipart/form-data';
            $payload = $this->payload;
        } else {
            $contentType = 'application/json';
            $payload = json_encode($this->payload);
        }

        $request = Request::POST($this->endpoint, $payload)
            ->addOpts([
                CURLOPT_HTTPHEADER => [
                    'Authorization: Bearer ' . $this->token,
                    'Content-Type: ' . $contentType
                ]
            ]);

        return $request->run($endpoint)
            ->toJson(true)
            ->body();
    }

    public function addOpt(array $opt): static
    {
        $this->payload = array_merge($this->payload, $opt);
        return $this;
    }
}
