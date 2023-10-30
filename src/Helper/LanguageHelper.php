<?php

namespace Badinansoft\LanguageSwitch\Helper;

class LanguageHelper
{
    public static function getSupportedLanguages()
    {
        if (config('nova-language-switch.source') === 'array') {
            return config('nova-language-switch.supported-languages');
        }

        if (config('nova-language-switch.source') === 'database') {
            $model = config('nova-language-switch.database.model');
            $code = config('nova-language-switch.database.code_field');
            $label = config('nova-language-switch.database.label_field');

            $languages = ($model)::all()->mapWithKeys(function ($item) use ($code, $label) {
                return [$item->{$code} => $item->{$label}];
            });

            return $languages->toArray();
        }

        return ['en' => 'English'];
    }

    public static function getRTLLanguages()
    {
        if (config('nova-language-switch.source') === 'array') {
            return config('nova-language-switch.rtl-languages');
        }

        if (config('nova-language-switch.source') === 'database') {
            $model = config('nova-language-switch.database.model');
            $code = config('nova-language-switch.database.code_field');
            $rtl = config('nova-language-switch.database.rtl_field');

            $languages = ($model)::all()->where($rtl, true)->map(function ($item) use ($code) {
                return $item->{$code};
            });

            return $languages->toArray();
        }

        return [];
    }
}
