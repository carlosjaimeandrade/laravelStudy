<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

//laravel versao 6
//Route::get('/', 'HomeController@index');
//rotas + controllers melhor sempre usar assim no laravel 8

Route::get('/', [HomeController::class, 'index']);

Route::get('/config', [ConfigController::class, 'index']);
//via post posso pedir apos receber a requisição para direcionar para outra class por exemplo
//[ConfigController::class, 'user'] mas no caso abaiixo esta na mesma class
Route::post('/config', [ConfigController::class, 'index']);

Route::get('/config/user', [ConfigController::class, 'user']);



