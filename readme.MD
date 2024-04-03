# WhatsApp api

Call meta api

## Installation

```bash
composer require kombyte/meta-whatsapp-api
```

```php
use Kombyte\Whatsapp\Api;
use Kombyte\Whatsapp\Messages;
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
