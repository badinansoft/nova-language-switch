<?php

namespace Badinansoft\LanguageSwitch\Http\Middleware;

use Badinansoft\LanguageSwitch\Helper\LanguageHelper;
use Cache;
use Closure;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class LanguageSwitch
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request,mixed $next):mixed
    {
        $lang = Cache::get(auth()->guard(config('nova.guard'))->id().'.locale');
        if ($lang) {
            app()->setLocale($lang);
            if (in_array($lang,LanguageHelper::getRTLLanguages(), true)) {
                Nova::enableRTL();
            }
        }
        return $next($request);
    }
}
