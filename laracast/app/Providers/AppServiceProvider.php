<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Bar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * @return void
     */
    public function register()
    {
            
        // //register the service then boot

        // [ using service provider ]
        // $this->app->singleton(Bar::class, function() {
        //     return new Bar('xzczxczxczcx');
        // });

            // interface
        // $this->app->bind(
        //     \App\Repositories\UserRepository::class,
        //     \App\Repositories\DbUserRepository::class
        // );
    }

    /**
     * Bootstrap any application services.
     * 
     * @return void
     */
    public function boot()
    {
        //boot the service
    }
}
