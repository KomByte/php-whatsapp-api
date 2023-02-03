<?php

namespace Mateodioev\WhatsappApi;

use Mateodioev\Request\Request;

use function sprintf;
use function json_encode;
use function array_merge;

class Api
{
    public const BASE_URL = 'https://graph.facebook.com/%s/%s/';
    public const VERSION = 'v13.0';

    public array $payload = ['messaging_product' => 'whatsapp'];
    public string $endpoint;

    public function __construct(private string $token, private int $phoneNumberId)
    {}

    public function send(string $endpoint, array $payload, string $version = self::VERSION): \stdClass
    {
        $this->endpoint = sprintf(self::BASE_URL, $version, $this->phoneNumberId);
        $payload = json_encode($this->addOpt($payload)->payload);

		$request = Request::POST($this->endpoint, $payload)
			->addOpts([
				CURLOPT_HTTPHEADER => [
					'Authorization: Bearer ' . $this->token,
					'Content-Type: application/json'
				]
			]);


		return $request->run($endpoint)
			->toJson(true, true)
			->getBody();
    }

    public function addOpt(array $opt): static
    {
        $this->payload = array_merge($this->payload, $opt);
        return $this;
    }
}
