<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Bar;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
         //register the service then boot

        //  [ Custom Service Provider ]
        // go to config/app to register a provider
        //  $this->app->singleton(Bar::class, function() {
        //     return new Bar('xzczxczxczcx');
        // });
   
        $this->app->singleton(Bar::class, function() {
            // return new Bar(config('services.apiKey.key'));
            return new Bar(config('myconfig.apiKey.secret')); //custom config
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
