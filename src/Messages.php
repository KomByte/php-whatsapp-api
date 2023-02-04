<?php

namespace Mateodioev\WhatsappApi;

use Mateodioev\Utils\{Arrays, Network};
use Mateodioev\WhatsappApi\Exceptions\InvalidMediaException;
use Mateodioev\WhatsappApi\Objects\{Contacts, Interactive, Location, Media, Reaction, Template, Text};
use stdClass;

use function substr;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages
 */
class Messages
{
    protected string $type = 'messages';

    private array $allowedMediaTypes = ['audio', 'document', 'image', 'sticker', 'video'];

    public function __construct(protected Api $api) {}

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
            'text' => Text::new()->setBody($message)->setPreviewUrl($previewUrl)->get()
        ])->send($this->type);
    }

    /**
     * Reaction to message
     *
     * @param string $messageId The WhatsApp Message ID (wamid) of the message on which the reaction should appear.
     * @param string $emoji Emoji to appear on the message. Send empty string to remove previously reaction.
     * @throws \ReflectionException
     * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#reaction-object
     */
	public function sendReaction(string $messageId, string $emoji): stdClass
	{
		return $this->api->addOpt([
			'recipient_type' => 'individual',
			'type' => 'reaction',
            'reaction' => Reaction::new()->setMessageId($messageId)->setEmoji($emoji)->get()
		])->send($this->type);
	}

    /**
     * Send media
     * @param string $mediaType audio, document, image, sticker, or video
     * @param string $media Media url or id
     * @throws \ReflectionException
     * @see https://developers.facebook.com/docs/whatsapp/cloud-api/guides/send-messages#media-messages
     */
    public function sendMedia(string $mediaType, string $media, string $caption = ''): stdClass
    {
        if (!in_array($mediaType, $this->allowedMediaTypes)) {
            throw new InvalidMediaException("Unknown media type " . $mediaType);
        }
        if (in_array($mediaType, ['audio', 'sticker']) && !empty($caption)) {
            throw new InvalidMediaException('Not use caption when sending audios or stickers');
        }

        // Media type for send
        $mediaObj = Media::new()->setId($media);
        if (Network::IsValidUrl($media)) {
            $mediaObj->setLink($media)
                ->setId('');
        }
        $caption = substr($caption, 0, 1024);
        $mediaObj->setCaption(substr($caption, 0, 1024));

        return $this->api->addOpt([
            'recipient_type' => 'individual',
            'type' => $mediaType,
            $mediaType => $mediaObj->get()
        ])->send($this->type);
    }

    /**
     * Send location of the user
     * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#location-object
     * @throws \ReflectionException
     */
    public function sendLocation(Location $location): stdClass
    {
        return $this->api->addOpt([
            'type' => 'location',
            'location' => $location->get()
        ])->send($this->type);
    }

    /**
     * https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
     *
     * @param Contacts[] $contacts Array of contacts
     * @throws \ReflectionException
     */
    public function sendContact(array $contacts): stdClass
    {
        return $this->api->addOpt([
          'type' => 'contacts',
          'contacts' => array_map(fn($contact) => $contact->get(), $contacts)
        ])->send($this->type);
    }

    /**
     * @throws \ReflectionException
     */
    public function sendInteractive(Interactive $interactive): stdClass
    {
        return $this->api->addOpt([
            'type' => 'interactive',
            'interactive' => $interactive->get()
        ])->send($this->type);
    }

    /**
     * @throws \ReflectionException
     */
    public function sendTemplate(Template $template): stdClass
    {
        return $this->api->addOpt([
          'type' => 'template',
            'template' => $template->get()
        ])->send($this->type);
    }

    /**
     * @see https://developers.facebook.com/docs/whatsapp/cloud-api/guides/mark-message-as-read
     */
    public function markAsRead(string $messageId): void
    {
        $this->api->addOpt([
          'status' => 'read',
          'message_id' => $messageId
        ])->send($this->type);
    }

}
