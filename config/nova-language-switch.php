<?php
/**
 * @author  BadinanSoft
 * @package BadinanSoft\LanguageSwitch
 * @license MIT
 * @link    https://badinansoft.com
 */

return [

    /**
     * The source of supported locales on the application.
     * Available selection "array", "database". Default array.
     * When you set source "array" you can declare your languages from below at locales.
     * And when you set source "database" you can declare languages model from below and follow database instructions.
     */
    'source'              => 'array',

    /**
     * If you choose database selection, you should create or choose the model responsible for retrieving supported translations.
     * If there is not existed model for retrieving supported translations, you must create a new model and must contain two columns from values "code_field", "label_field".
     * And choose the 'code_field' for example "en","ar"...
     * And choose the 'label_field' which will be shown for users, for example "English","EN", ....
     * And choose the 'rtl_field' which is a boolean, if set to true it will be set as RTL support required for this language, ....
     */
    'database'            => [
        'model'       => 'App\\Models\\Language',
        'code_field'  => 'code',
        'label_field' => 'label',
        'rtl_field'   => 'is_rtl',
    ],

    /**
     * List of languages that your application supports
     * array <string, string>
     */
    'supported-languages' => [
        'en' => 'English',
        'ar' => 'Arabic',
    ],

    /**
     * Languages That need RTL support
     * string
     */
    'rtl-languages'       => [
        'ar',
    ],

];
