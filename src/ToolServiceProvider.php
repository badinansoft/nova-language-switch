<?php

namespace Badinansoft\LanguageSwitch;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Badinansoft\LanguageSwitch\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/nova-language-switch.php' => config_path('nova-language-switch.php'),
        ], 'config');


        $this->app->booted(function () {
            $this->routes();
        });
    }


    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/language-switch')
                ->group(__DIR__.'/../routes/api.php');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nova-language-switch.php', 'nova-language-switch');

    }
}
