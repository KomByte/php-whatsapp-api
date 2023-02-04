# WhatsApp api

Call meta api

## Installation

```bash
composer require mateodioev/meta-whatsapp-api
```

```php
use Mateodioev\WhatsappApi\Api;
use Mateodioev\WhatsappApi\Messages;
```

## Usage

Create new `Messages` instance with `Api`

```php
$messages = new Messages(new Api($yourToken));
```

### Send messages

Add destination

```php
$messages->to('phone number')
    ->sendText('Hello');
```
