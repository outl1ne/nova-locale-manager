# Nova Locale Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/outl1ne/nova-locale-manager.svg?style=flat-square)](https://packagist.org/packages/outl1ne/nova-locale-manager)
[![Total Downloads](https://img.shields.io/packagist/dt/outl1ne/nova-locale-manager.svg?style=flat-square)](https://packagist.org/packages/outl1ne/nova-locale-manager)

This [Laravel Nova](https://nova.laravel.com) package allows you to manage simple locales.

## Features

- Locale creation (name and slug)
- Locale state management (active, default)

## Requirements

- `php: >=8.0`
- `laravel/nova: ^4.0`

## Installation

Install the package in a Laravel Nova project via Composer:

```bash
# Install nova-locale-manager
composer require outl1ne/nova-locale-manager

# Run migrations
php artisan migrate
```

## Usage

### nova_get_locales(\$activeOnly = false)

Parameter `$activeOnly` decides wether to return only `active` locales or all.

Returns the locales as a `slug => name` map.

```php
[
    'en' => 'English',
    'et' => 'Estonian',
]
```

### nova_get_locales_full(\$activeOnly = false)

Parameter `$activeOnly` decides wether to return only `active` locales or all.

Returns the locales and all their data.

```php
[
    [
        'name' => 'English',
        'slug' => 'en',
        'active' => false,
        'default' => false,
    ],
    [
        'name' => 'Estonian',
        'slug' => 'et',
        'active' => true,
        'default' => true,
    ],
]
```

### nova_get_default_locale()

Returns the default locale's full data.

```php
[
    'name' => 'English',
    'slug' => 'en',
    'active' => false,
    'default' => false,
],
```

### nova_get_default_locale_slug()

Returns the default locale's slug.

```php
'en'
```

### Handling locale deletion

You can get register a callback for when a locale is deleted using the `NovaLocaleManager::deleteCallback()` function. You can register the call back in `NovaServiceProvider`'s `boot()` function.

Example:

```php
// in app/Providers/NovaServiceProvider.php

public function boot()
{
    \Outl1ne\NovaLocaleManager\NovaLocaleManager::deleteCallback(function ($locale) {
        // $locale is the Locale model
        // Locale ID: $locale->id
        // Locale slug: $locale->locale
        // Locale name: $locale->name
    });
}
```

## Configuration

The config file can be published using the following command:

```bash
php artisan vendor:publish --provider="Outl1ne\NovaLocaleManager\NovaLocaleManagerServiceProvider" --tag="config"
```

## Credits

- [Tarvo Reinpalu](https://github.com/Tarpsvo)

## License

Nova Locale Manager is open-sourced software licensed under the [MIT license](LICENSE.md).
