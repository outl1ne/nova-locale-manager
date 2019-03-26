<?php

namespace OptimistDigital\NovaLocaleManager\Models;

use Illuminate\Database\Eloquent\Model;
use OptimistDigital\NovaLocaleManager\NovaLocaleManager;

class Locale extends Model
{
    protected $table = 'nova_locale_manager';

    protected $fillable = ['name', 'locale'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($locale) {
            if (is_callable(NovaLocaleManager::getDeleteCallback())) {
                NovaLocaleManager::getDeleteCallback()($locale);
            }
        });
    }
}
