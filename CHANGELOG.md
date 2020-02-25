# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2020-02-25

### Added

- Added `active` boolean to locales (NB! Requires `php artisan migrate`)
- Added new helper function `nova_get_active_locales()`
- Added new helper function `nova_get_default_locale_slug()`

### Changed

- Migrations are now loaded automatically, you can delete the old migration(s) from your project:

  - `2019_03_26_000000_create_locale_manager_tables.php`
  - `2019_03_26_000001_add_default_boolean.php`

- Made a new (inline) action "Toggle active" which enables/disables the locale
- Made a new (inline) action "Make default" which makes the selected locale the default one
- Reworked index view's UI and layout
- Caching now uses `spatie/once` instead of static properties
- Renamed `locale` column to `slug` (NB! Requires `php artisan migrate`)
- Refactored a lot of code

## [1.0.0] - 2019-03-26

Initial release.
