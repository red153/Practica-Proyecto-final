<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class SecureURLServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
