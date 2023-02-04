<?php

namespace Mateodioev\WhatsappApi\Objects;

/**
 * @see https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#contacts-object
 */
class Contacts extends abstractObject implements ObjectInterface
{
    /**
     * @var Address[] Full contact address(es) formatted as an addresses object.
     */
	public array $addresses = [];

    /**
     * @var string YYYY-MM-DD formatted string.
     */
    public string $birthday = '';

    /**
     * @var Email[] Contact email address(es)
     */
    public array $emails = [];

    public Name $name;
    public Org $org;

    /**
     * @var Phone[]
     */
    public array $phones = [];

    /**
     * @var Url[] Contact URL(s)
     */
    public array $urls = [];


	public static function new(): static
    {
        return new static();
    }

    /**
     * @throws \ReflectionException
     */
    public function get(): array
    {
        return $this->getProperties();
    }

    public function setAddresses(array $addresses): Contacts
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function setBirthday(string $birthday): Contacts
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function setEmails(array $emails): Contacts
    {
        $this->emails = $emails;
        return $this;
    }

    public function setName(Name $name): Contacts
    {
        $this->name = $name;
        return $this;
    }

    public function setOrg(Org $org): Contacts
    {
        $this->org = $org;
        return $this;
    }

    public function setPhones(array $phones): Contacts
    {
        $this->phones = $phones;
        return $this;
    }

    public function setUrls(array $urls): Contacts
    {
        $this->urls = $urls;
        return $this;
    }


}
