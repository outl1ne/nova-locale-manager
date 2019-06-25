<?php

use OptimistDigital\NovaLocaleManager\Models\Locale;
use OptimistDigital\NovaLocaleManager\NovaLocaleManager;

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
            return Locale
                ::orderBy('default', 'desc')
                ->get()
                ->map(function ($locale) {
                    return [
                        'name' => $locale->name,
                        'slug' => $locale->locale,
                        'default' => $locale->default,
                    ];
                })
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }
}
