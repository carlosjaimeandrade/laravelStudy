<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//isso pode ser subistituido pelo route::view quando desejams apenas carregar um view
//Route::get('/teste', function () {
    //pode colocar echo aqui tambem
    //return view('teste');
//});

Route::view('/teste','teste');

//redirecionamento automatico
Route::redirect('/welcome','teste');