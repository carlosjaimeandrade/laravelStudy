<?php
//sempre devemos imortar a class do controler
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
//criando rota para registrar
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/config', [ConfigController::class, 'index'])->name('config.index')->middleware('auth');
//via post posso pedir apos receber a requisição para direcionar para outra class por exemplo
//[ConfigController::class, 'user'] mas no caso abaiixo esta na mesma class
Route::post('/config', [ConfigController::class, 'index']);

Route::get('/config/user', [ConfigController::class, 'user']);

// vamos criar as mesmas rotas de tarefas, mas utilizando um controller rosource
Route::resource('todo', TodoController::class);
/*
ele criaq essas rotas
GET - rota -> /todo - metodo -> Index - ja cria com o nome-> todo.index (lista os item)
GET - /todo/create - create - todo.create (from de criação)
POST - /todo - store - todo.store - RECEBER OS DADOS E ADD ITEM
GET - /todo/{id} - show - todo.show - ITEM INDIVIDUAL
GET - /todo/{id}/edit - edit - todo.edit - FORMA DE EDIÇÃO
PUT - /todo/{id} - update - todo.update - RECEBE os dados e update item
DELETE - /todo/{id} - destroy - todo.destroy - DELETA O ITEM
*/

// dentro desse grupo de rota defini um contructer para poder travar as rotas sem login
// aqui criamos as rotas sem utilizar o rosource 
Route::prefix('/tarefas')->group(function () {

    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list');;
    //Route::get('/', 'TarefasController@list'); //listagem de tarefas

    Route::get('/add', [TarefasController::class, 'add'])->name('tarefas.add');
    //Route::get('add', 'TarefasController@add'); //tela de adição de nova tarefa
    Route::post('/add', [TarefasController::class, 'addAction']);
    //Route::post('add', 'TarefasController@addAction'); //ação de adição de nova tarefa
    Route::get('/edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit');
    //Route::get('edit/{id}', 'TarefasController@edit'); //tela de edição
    //Route::post('edit/{id}', 'TarefasController@editAction'); //ação de adição
    Route::post('/edit/{id}', [TarefasController::class, 'editAction']);
    //Route::get('delete/{id}', 'TarefasController@del'); //tela de deletar
    Route::get('/delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del');
    //Route::get('marcar/{id}', 'TarefasController@done'); //tela de resolvido/NÃO
    Route::get('/marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done');

});



// esse comando tras os controller da rota de Autenticação automaticamente

//Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
