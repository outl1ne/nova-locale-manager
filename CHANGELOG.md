# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.4] - 07-02-2022

### Changed

- Allow spatie/once 3.0

## [2.0.3] - 2021-05-07

### Changed

- Added nullable type declarations for return value

## [2.0.2] - 2020-05-26

### Changed

- Fixed locale helpers returning an associative array instead of a regular array when one of the locales isn't active

## [2.0.1] - 2020-03-05

### Added

- Support Nova 3.0 in `composer.json` requirements

## [2.0.0] - 2020-02-25

### Added

- Added `active` boolean to locales (NB! Requires `php artisan migrate`)
- Added `nova_get_default_locale_slug()` helper function

### Changed

- Migrations are now loaded automatically, you can delete the old migration(s) from your project:

  - `2019_03_26_000000_create_locale_manager_tables.php`
  - `2019_03_26_000001_add_default_boolean.php`

- Made a new (inline) action "Toggle active" which enables/disables the locale
- Made a new (inline) action "Make default" which makes the selected locale the default one
- Reworked index view's UI and layout
- Caching now uses `spatie/once` instead of static properties
- Renamed `locale` column to `slug` (NB! Requires `php artisan migrate`)
- Added `$activeOnly` option to `nova_get_locales($activeOnly = false)`
- Added `$activeOnly` option to `nova_get_locales_full($activeOnly = false)`
- Refactored a lot of code

## [1.0.0] - 2019-03-26

Initial release.
