<?php

namespace OptimistDigital\NovaLocaleManager\Nova\Actions;

use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class ToggleLocaleActive extends Action
{
    public $name = 'Toggle active';
    public $showOnTableRow = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $locale) {
            $locale->active = !$locale->active;
            $locale->save();
        }
    }
}
