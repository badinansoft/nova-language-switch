<?php

namespace Badinansoft\LanguageSwitch;

use Illuminate\Http\Request;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class LanguageSwitch extends Tool
{

    public function boot(): void
    {
        Nova::script('language-switch', __DIR__.'/../dist/js/tool.js');
        Nova::provideToScript([
            'nova_language_switcher' => function() {
                return [
                    'languages' => config('nova-language-switch.supported-languages'),
                    'current_lang' => app()->getLocale(),
                ];
            }
        ]);
    }


    public function menu(Request $request): mixed
    {
        return null;
    }
}
