<?php

namespace App\Providers;

use App\Contracts\Customer\CustomerableService;
use App\Contracts\GameEngine\GamebleService;
use App\Contracts\GameEngine\GameLinkableService;
use App\Contracts\Link\LinkableService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerableService::class, config('providers.customerable'));
        $this->app->bind(LinkableService::class, config('providers.linkable'));
        $this->app->bind(GamebleService::class, config('providers.gameble'));
        $this->app->bind(GameLinkableService::class, config('providers.gameble'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
