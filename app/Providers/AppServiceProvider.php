<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Dados Globais importar essa class
use Illuminate\Support\Facades\view;

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
        //configurar dados globais
        View::share('versao', '1.0');
    }
}
