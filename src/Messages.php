<?php 

namespace Mateodioev\WhatsappApi;

use Mateodioev\Utils\{Arrays, Network};
use Mateodioev\WhatsappApi\Exceptions\InvalidMediaException;

use stdClass;
use function substr;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages
 */
class Messages
{
  protected Api $api;
  protected string $type = 'messages';

  private array $allowedMediaTypes = ['audio', 'document', 'image', 'sticker', 'video'];

  public function __construct(Api $api) {
    $this->api = $api;
  }

  /**
   * Reply to message id
   * @see https://developers.facebook.com/docs/whatsapp/cloud-api/guides/send-messages#replies
   */
  public function replyTo(string $previousMessageId): Messages
  {
    $this->api->addOpt(['context' => ['message_id' => $previousMessageId]]);
    return $this;
  }

  /**
   * Set destination for messages
   *
   * @param string|integer $phoneNumber Phone number or wa_id
   * @return Messages
   */
  public function to(string|int $phoneNumber): Messages
  {
    $this->api->addOpt(['to' => $phoneNumber]);
    return $this;
  }

  /**
   * Send simple message text
   *
   * @param string $message Message to send
   * @param boolean $previewUrl Pass true to preview url
   * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#text-object
   */
  public function sendText(string $message, bool $previewUrl = false): stdClass
  {
    return $this->api->addOpt([
      'recipient_type' => 'individual',
      'type' => 'text',
      'text' => [
        'preview_url' => $previewUrl,
        'body' => $message
      ]
    ])->send($this->type, $this->api->payload);
  }

  /**
   * Send media
   * @param string $mediaType audio, document, image, sticker, or video
   * @param string $media Media url or id
   * @see https://developers.facebook.com/docs/whatsapp/cloud-api/guides/send-messages#media-messages
   */
  public function sendMedia(string $mediaType, string $media, string $caption = ''): stdClass
  {
    if (!in_array($mediaType, $this->allowedMediaTypes)) throw new InvalidMediaException("Unknown media type " . $mediaType);
    if (in_array($mediaType, ['audio', 'sticker']) && !empty($caption)) throw new InvalidMediaException('Not use caption when sending audios or stickers');

    // Media type for send
    $type = 'id'; 
    if (Network::IsValidUrl($media)) $type = 'link';

    $caption = substr($caption, 0, 1024);

    return $this->api->addOpt([
      'recipient_type' => 'individual',
      'type' => $mediaType,
      $mediaType => [
        $type => $media,
        'caption' => $caption
      ]
    ])->send($this->type, $this->api->payload);
  }

    /**
     * Send location of the user
     *
     * @param mixed $long Longitude
     * @param mixed $lat Latitude
     * @param string $name
     * @param string $address
     * @return stdClass
     */
  public function sendLocation(mixed $long, mixed $lat, string $name, string $address): stdClass
  {
    return $this->api->addOpt([
      'type' => 'location',
      'location' => [
        'longitude' => $long,
        'latitude' => $lat,
        'name' => $name,
        'address' => $address
      ]
    ])->send($this->type, $this->api->payload);
  }

  /**
   * https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
   *
   * @param array $contacts Create list of contacts with Messages::contact() method
   */
  public function sendContact(array $contacts): stdClass
  {
    return $this->api->addOpt([
      'type' => 'contacts',
      'contacts' => $contacts
    ])->send($this->type, $this->api->payload);
  }

  public function sendInteractive(array $interactive): stdClass
  {
    return $this->api->addOpt($interactive)->send($this->type, $this->api->payload);
  }

  public function sendTemplate(): stdClass
  {
    return $this->api->addOpt([
      ''
    ])->send($this->type, $this->api->payload);
  }

  /**
   * @see https://developers.facebook.com/docs/whatsapp/cloud-api/guides/mark-message-as-read
   */
  public function markAsRead(string $messageId): void
  {
    $this->api->addOpt([
      'status' => 'read',
      'message_id' => $messageId
    ])->send($this->type, $this->api->payload);
  }

  public static function contact(array $name, ?array $addresses=null, ?string $birthday=null, ?array $emails=null, ?array $org=null, ?array $phones=null, ?array $urls=null): array
  {
    $payload = [
      'name' => $name,
      'addresses' => $addresses,
      'birthday' => $birthday,
      'emails' => $emails,
      'org' => $org,
      'phones' => $phones,
      'urls' => $urls
    ];

    return Arrays::DeleteEmptyKeys($payload);
  }

}
