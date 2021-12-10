<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Dados Globais importar essa class
use Illuminate\Support\Facades\view;
// para simplificar os componentes 
use Illuminate\Support\Facades\Blade;

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

        // aqui criamos um componentes simplificado para mostrar com a tag x-"NOME"
        //no caso abaixo definimos o alert como o NOME
        // e o components.alert o caminho pasta components/alert
        Blade::component('components.alert', 'alert');
    }
}
