<?php 

namespace Mateodioev\WhatsappApi;

use Mateodioev\Request\Request;

use function sprintf, json_encode, array_merge;

class Api
{
  public const BASE_URL = 'https://graph.facebook.com/%s/%s/';
  public const VERSION = 'v13.0';

  private Request $client;
  private string $token;
  private int $phoneId;

  public array $payload = ['messaging_product' => 'whatsapp'];
  public string $endpoint;

  public function __construct(string $token, int $phoneNumberId) {
    $this->client = new Request;
    $this->token = $token;
    $this->phoneId = $phoneNumberId;

  }

  public function send(string $endpoint, array $payload, string $version = self::VERSION)
  {
    $this->endpoint = sprintf(self::BASE_URL, $version, $this->phoneId);
    $payload = json_encode($this->addOpt($payload)->payload);

    $this->client->init($this->endpoint, [
      CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $this->token,
        'Content-Type: application/json'
      ],
      CURLOPT_POSTFIELDS => $payload,
      CURLOPT_POST => true
    ]);



    $response = $this->client->setMethod('POST')
      ->Run($endpoint);

    return $response->toJson(true)->getBody();
  }

  public function addOpt(array $opt)
  {
    $this->payload = array_merge($this->payload, $opt);
    return $this;
  }
}
