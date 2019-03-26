<?php

use OptimistDigital\NovaLocaleManager\Models\Locale;

if (!function_exists('nova_get_locales')) {
    function nova_get_locales()
    {
        return Locale::all()->pluck('name', 'locale');
    }
}

