<?php

use Illuminate\Support\Arr;
use OptimistDigital\NovaLocaleManager\NovaLocaleManager;

if (!function_exists('nova_get_locales')) {
    function nova_get_locales($activeOnly = false): ?array
    {
        try {
            return $activeOnly
                ? NovaLocaleManager::getActiveLocales()
                : NovaLocaleManager::getLocales();
        } catch (\Exception $e) {
            return [];
        }
    }
}

if (!function_exists('nova_get_locales_full')) {
    function nova_get_locales_full($activeOnly = false): ?array
    {
        try {
            return $activeOnly
                ? NovaLocaleManager::getActiveLocalesFull()
                : NovaLocaleManager::getLocalesFull();
        } catch (\Exception $e) {
            return [];
        }
    }
}

if (!function_exists('nova_get_default_locale')) {
    function nova_get_default_locale(): ?array
    {
        $allLocales = nova_get_locales_full();
        return Arr::first($allLocales, function ($locale) {
            return $locale['default'];
        });
    }
}

if (!function_exists('nova_get_default_locale_slug')) {
    function nova_get_default_locale_slug(): ?string
    {
        $defaultLocale = nova_get_default_locale();
        return $defaultLocale['slug'] ?? null;
    }
}
