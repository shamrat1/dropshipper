<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::if('role', function ($role) {

            if (auth()->check() && auth()->user()->hasRole($role)) {
                return true;
            }
            return false;
        });

        \Validator::extendImplicit('current_password', function ($attribute, $value, $parameters, $validator) {
            return \Hash::check($value, auth()->user()->password);
        });
    }
}
