# Laravel SMS Capture

Capture outgoing SMS notifications in Laravel so they can be previewed during development.

## Requirements

This package has the following dependencies:

- Laravel 8+
- Pusher

This package works with the following Laravel SMS notification providers:

- Nexmo/Vonage

## Installation

This package can be installed via Composer:

```bash
composer require codium/laravel-sms-capture
```

Once installed make sure you've setup [Pusher in Laravel](https://laravel.com/docs/8.x/broadcasting#pusher-channels) so captured SMS notifications can be caught and displayed.

## Usage

This package exposes a single endpoint which you may access at `http://localhost/__sms`. Notifications will only be caught when this page has been loaded as they are not stored on the server side.

Caught notifications will be cached in your browsers local storage and you can clear them by using the `Clear Messages` button.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
