<?php

use OptimistDigital\NovaLocaleManager\NovaLocaleManager;
use Illuminate\Support\Arr;

if (!function_exists('nova_get_locales')) {
    function nova_get_locales(): array
    {
        try {
            return NovaLocaleManager::getLocales();
        } catch (\Exception $e) {
            return [];
        }
    }
}

if (!function_exists('nova_get_locales_full')) {
    function nova_get_locales_full(): array
    {
        try {
            return NovaLocaleManager::getLocalesFull();
        } catch (\Exception $e) {
            return [];
        }
    }
}

if (!function_exists('nova_get_default_locale')) {
    function nova_get_default_locale(): array
    {
        $allLocales = nova_get_locales_full();
        return Arr::first($allLocales, function ($locale) {
            return $locale['default'];
        });
    }
}
