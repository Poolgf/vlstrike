<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Configuration\Exceptions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    


    public function configureExceptions(Exceptions $exceptions): void
    {
        $exceptions->renderUsing(null);
    }



public function boot(): void
{
    if (config('APP.ENV') !== 'local') {
        URL::forceScheme('https');
    }
}

}
