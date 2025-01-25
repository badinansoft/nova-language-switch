## A Laravel Nova Tool to add language switcher to your application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/badinansoft/nova-language-switch.svg?style=flat-square)](https://packagist.org/packages/badinansoft/nova-language-switch)
[![Total Downloads](https://img.shields.io/packagist/dt/badinansoft/nova-language-switch.svg?style=flat-square)](https://packagist.org/packages/badinansoft/nova-language-switch)

This [Nova](https://nova.laravel.com) tool allows you to:
- Add a language switcher to the header of the Nova application
- Handle language switching and cache the current locale across multiple browsers
- Switch the application direction for RTL-supported languages

## Requirements
- PHP: >=8.0
- Laravel Nova: ^4.0|^5.0

> **Note**: This package is not compatible with Nova 3

## Features
- Add multiple languages from the configuration
- Remember locale settings using cache (no database table required)
- Auto-inject language switcher to the application header
- Easy 4-step setup

## Screenshots
| English | Arabic |
|---------|--------|
| ![English Screenshot](https://raw.githubusercontent.com/badinansoft/nova-language-switch/master/docs/en-screenshot.png) | ![Arabic Screenshot](https://raw.githubusercontent.com/badinansoft/nova-language-switch/master/docs/ar-screenshot.png) |

## Installation

Install the Nova tool via Composer:

```bash
composer require badinansoft/nova-language-switch
```

### Laravel 10 and Earlier

Register the tool in `app/Providers/NovaServiceProvider.php`:

```php
public function tools()
{
    return [
        // ...
        new \Badinansoft\LanguageSwitch\LanguageSwitch(),
    ];
}
```

Register the middleware in `app/Http/Kernel.php`:

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Badinansoft\LanguageSwitch\Http\Middleware\LanguageSwitch::class
    ],
];
```

### Laravel 11

Register the tool in `app/Providers/NovaServiceProvider.php` (same as Laravel 10):

```php
public function tools()
{
    return [
        // ...
        new \Badinansoft\LanguageSwitch\LanguageSwitch(),
    ];
}
```

Register the middleware in `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \Badinansoft\LanguageSwitch\Http\Middleware\LanguageSwitch::class,
    ]);
})
```

Publish the configuration file:

```bash
php artisan vendor:publish --provider="Badinansoft\LanguageSwitch\ToolServiceProvider" --tag="config"
```

### Configuration

Edit the published config file (`config/language-switch.php`):

```php
return [
    /**
     * Supported languages for your application
     * @var array<string, string>
     */
    'supported-languages' => [
        'en' => 'English',
        'ar' => 'Arabic',
        // Add or remove languages as needed
    ],

    /**
     * Languages that require RTL support
     * @var array<string>
     */
    'rtl-languages' => [
        'ar'
        // Add other RTL language codes
    ],
];
```

## Credits

- [Shahab Zebari](https://github.com/shahabzebare)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
