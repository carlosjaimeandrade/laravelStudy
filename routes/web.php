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

// dentro de {} podemos colocar nossa variavel dinamia para pegar o que o usuario digita
// posso ter mais de 1 slug (variavel) basca colocar  
Route::get('/noticias/{slug}', function ($e) {
    echo 'Titulo: Titulo qualquer: ';
    echo $e;
});

Route::get('/noticias/{slug}/comentario/{id}', function ($slug, $id) {
    echo "Variavel 1: {$slug}";
    echo "Variavel 2: {$id}";
});