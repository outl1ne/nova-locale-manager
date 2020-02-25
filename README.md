# Nova Locale Manager

This [Laravel Nova](https://nova.laravel.com) package allows you to manage simple locales.

## Features

- Locale management (name and slug)

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
