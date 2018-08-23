
# Display PHPInfo data in Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/davidpiesse/nova-phpinfo.svg?style=flat-square)](https://packagist.org/packages/davidpiesse/nova-phpinfo)
[![Total Downloads](https://img.shields.io/packagist/dt/davidpiesse/nova-phpinfo.svg?style=flat-square)](https://packagist.org/packages/davidpiesse/nova-phpinfo)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require davidpiesse/nova-phpinfo
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Davidpiesse\NovaPhpinfo\Tool(),
    ];
}
```

## Usage

Click on the "PHP Info" menu item in your Nova app to see the tool provided by this package.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email piesse@gmail.com instead of using the issue tracker.

## Credits

- [David Piesse](https://github.com/davidpiesse)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
