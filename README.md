# Nova Menu Builder

This [Laravel Nova](https://nova.laravel.com) package allows you to manage simple locales.

## Features

- Locale management (name and slug)

## Screenshots

TODO

## Installation

Install the package in a Laravel Nova project via Composer:

```bash
composer require optimistdigital/nova-locale-manager
```

Publish the database migration(s) and run migrate:

```bash
php artisan vendor:publish --provider="OptimistDigital\NovaLocaleManager\ToolServiceProvider" --tag="migrations"
php artisan migrate
```

Register the tool with Nova in the `tools()` method of the `NovaServiceProvider`:

```php
// in app/Providers/NovaServiceProvider.php

public function tools()
{
    return [
        // ...
        new \OptimistDigital\NovaLocaleManager\NovaLocaleManager
    ];
}
```

## Usage

### Accessing locales

To simplify accessing the locales, the package registers a helper function `nova_get_locales()` which returns an array where the locale slug is the key and the displayed name is the value.

```php
[
    'en_US' => 'English',
    'et_EE' => 'Estonian',
]
```

To get access to more detailed data, use the `nova_get_locales_full()` helper function, which returns the following format:

```php
[
    [
        'name' => 'English',
        'slug' => 'en_US',
        'default' => false,
    ],
    [
        'name' => 'Estonian',
        'slug' => 'et_EE',
        'default' => true,
    ],
]
```

### Handling locale deletion

You can get register a callback for when a locale is deleted using the `NovaLocaleManager::deleteCallback()` function. You can register the call back in `NovaServiceProvider`'s `boot()` function.

Example:

```php
// in app/Providers/NovaServiceProvider.php

public function boot()
{
    \OptimistDigital\NovaLocaleManager\NovaLocaleManager::deleteCallback(function ($locale) {
        // $locale is the Locale model
        // Locale ID: $locale->id
        // Locale slug: $locale->locale
        // Locale name: $locale->name
    });
}
```

## Credits

- [Tarvo Reinpalu](https://github.com/Tarpsvo)

## License

Nova Locale Manager is open-sourced software licensed under the [MIT license](LICENSE.md).
