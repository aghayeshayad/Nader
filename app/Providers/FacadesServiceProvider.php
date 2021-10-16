<?php

namespace App\Providers;

use App\Services\PasswordBroker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton('password', function() {
            return new PasswordBroker();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
