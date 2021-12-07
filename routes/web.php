<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfigController;
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

//rotas + controllers melhor sempre usar assim no laravel 8
Route::get('/config', [ConfigController::class, 'index']);
Route::get('/config/user', [ConfigController::class, 'user']);
Route::get('/', [HomeController::class, 'index']);