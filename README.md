# An SerwerSMS.pl driver for [kduma/sms](https://github.com/kduma-OSS/L5-SMS) package

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

An SerwerSMS.pl driver for [kduma/sms](https://github.com/kduma-OSS/L5-SMS) package

## Install

Via Composer

```bash
$ composer require kduma/sms-driver-serwersms
```

In Laravel 5.6, service provider is automatically discovered. If you don't use package discovery, 
add the Service Provider to the providers array in `config/app.php`:

    KDuma\SMS\Drivers\SerwerSMS\SerwerSMSServiceProvider::class,
    
Create new channel or reconfigure existing in `sms.php` config file:

```php
'serwersms' => [
    'driver'   => 'serwersms',
    'login'    => env('SMS_SERWERSMS_LOGIN'),
    'password' => env('SMS_SERWERSMS_PASSWORD'),
    'sender'   => 'INFORMACJA',
    'eco'      => true,
    'flash'    => false,
],
```

## Available Options

| Option   | Default | Description                                 |
|----------|---------|---------------------------------------------|
| login    | `null`  | Login to serwersms.pl panel                 |
| password | `null`  | Password to serwersms.pl panel              |
| sender   | `null`  | Sender name                                 |
| eco      | `true`  | Send eco message                            |
| flash    | `false` | Send flash message                          |
| test     | `false` | If test is turned on, messages aren't sent. |
    

## Credits

- [Krystian Duma][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kduma/sms-driver-serwersms.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kduma/sms-driver-serwersms.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kduma/sms-driver-serwersms
[link-downloads]: https://packagist.org/packages/kduma/sms-driver-serwersms
[link-author]: https://github.com/kduma
[link-contributors]: ../../contributors
