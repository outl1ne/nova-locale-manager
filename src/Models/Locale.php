<?php

namespace OptimistDigital\NovaLocaleManager\Models;

use Illuminate\Database\Eloquent\Model;
use OptimistDigital\NovaLocaleManager\NovaLocaleManager;

class Locale extends Model
{
    protected $table = 'nova_locale_manager';
    protected $fillable = ['name', 'locale', 'default'];
    protected $casts = ['default' => 'boolean'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($locale) {
            if ($locale->default == true) {
                // Set other defaults to false
                Locale::where('id', '!=', $locale->id)->update(['default' => false]);
            } else {
                // If default does not exist, make this the default
                if (Locale::where('default', true)->first() == null) {
                    $locale->default = true;
                };
            }
        });

        static::deleting(function ($locale) {
            if ($locale->default == true) {
                $nextLocale = Locale::where('id', '!=', $locale->id)->first();
                if ($nextLocale != null) $nextLocale->update(['default' => true]);
            }

            if (is_callable(NovaLocaleManager::getDeleteCallback())) {
                NovaLocaleManager::getDeleteCallback()($locale);
            }
        });

        static::updating(function ($locale) {
            if ($locale->default == true) {
                Locale::where('id', '!=', $locale->id)->update(['default' => false]);
            } else {
                // Can not unset default when this was the default value
                if (Locale::where('id', '!=', $locale->id)->where('default', true)->first() == null) {
                    $locale->default = true;
                }
            }
        });
    }
}
