<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $is_production = env('APP_ENV') === 'production' ? true : false;
        if ($is_production) {
            \URL::forceScheme('https');
        }

        \View::share('is_production',$is_production);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
