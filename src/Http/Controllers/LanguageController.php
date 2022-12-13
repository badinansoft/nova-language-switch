<?php

namespace Badinansoft\LanguageSwitch\Http\Controllers;

use Cache;
use Illuminate\Http\JsonResponse;

class LanguageController
{

    public function __invoke(string $lang): JsonResponse
    {
        $languages = config('nova-language-switch.supported-languages');
        if (array_key_exists($lang, $languages)) {
            $key = auth()->guard(config('nova.guard'))->id().'.locale';
            Cache::forever($key, $lang);
            app()->setLocale($lang);
        }
        return response()->json(['status' => 'success']);
    }

}