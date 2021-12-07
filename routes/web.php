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

//Providers
//vai da notfound se no segundo parametro colocar LETRAS pois no app/providers esta setado Route::pattern('id', '[0-9]+');
Route::get('/noticias/{slug}/comentario/{id}', function ($slug, $id) {
    echo "Variavel 1: {$slug}";
    echo "Variavel 2: {$id}";
});

// empressao regular COM FILTRO
Route::get('/user/{name}', function ($name) {
    echo "mostrando o usuario NOME $name";
});

Route::get('/user/{id}', function ($id) {
    echo "mostrando o usuario ID $id";
})->where('name', '[0-9]+');


Route::get('/config/info', function(){
    echo "configuração info";
});

//**Rotas com Nome + Redirect
/* Route::get('/config', function(){
    //pega o valor do nome dado pra rota 
    $link = route('info');
    echo "link:" . $link;
    //redireciona
    return redirect()->route('permissao');
    //carrega a vieew
    return view('config');

});

Route::get('/config/info', function(){
    echo "configuração info";
})->name('info');

Route::get('/config/premissoes', function(){
    echo "configuração premissoes";
})->name('permissao'); */


//Grupo de Rotas podemos agrupar rotas criando um prefix como exemplo o prefix config
Route::prefix('/config')->group(function(){
    Route::get('/', function(){
        return view('config');
    });

    Route::get('/info', function(){
        echo "Configuração info";
    });

    Route::get('/permissao', function(){
        echo "Configuração permissao";
    });
  
});

// controlar 404 de rotas not found
// sempre colocar no final do codigo
Route::fallback(function(){
    return view('notfound');
});