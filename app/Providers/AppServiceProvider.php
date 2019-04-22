<?php

namespace App\Providers;

use App\Convocatory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema

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
        view()->composer('auth.register', function($view) {
            $view->with('convocatory', Convocatory::showActive());
        });

        view()->composer('auth.login', function($view) {
            $view->with('convocatory', Convocatory::showActive());
        });

        view()->composer('home', function($view) {
            $view->with('profile', Auth::user()->profile);
        });
    }
}