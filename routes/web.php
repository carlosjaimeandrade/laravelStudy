<?php
//sempre devemos imortar a class do controler
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;
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

Route::prefix('/tarefas')->group(function () {

    Route::get('/', [TarefasController::class, 'list']);
    //Route::get('/', 'TarefasController@list'); //listagem de tarefas

    Route::get('/add', [TarefasController::class, 'add']);
    //Route::get('add', 'TarefasController@add'); //tela de adição de nova tarefa
    Route::post('/add', [TarefasController::class, 'addAction']);
    //Route::post('add', 'TarefasController@addAction'); //ação de adição de nova tarefa

    Route::get('/edit', [TarefasController::class, 'edit']);
    //Route::get('edit/{id}', 'TarefasController@edit'); //tela de edição
    //Route::post('edit/{id}', 'TarefasController@editAction'); //ação de adição
    Route::post('/edit', [TarefasController::class, 'editAction']);
    //Route::get('delete/{id}', 'TarefasController@del'); //tela de deletar
    Route::get('/delete', [TarefasController::class, 'del']);
    //Route::get('marcar/{id}', 'TarefasController@done'); //tela de resolvido/NÃO
    Route::get('/marcar', [TarefasController::class, 'done']);

});



