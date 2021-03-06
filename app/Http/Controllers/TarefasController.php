<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// inserindo o banco de dados
use Illuminate\Support\Facades\DB;
// caso deseja destruir a sessao no controller
use Illuminate\Support\Facades\Session;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    //criando um contructer você pode definir um middleware nele para poder solicitar a senha de

    public function __construct(){
        $this->middleware('auth');
    }

    //sempre ter um para GET e para
    public function list()
    {

        /* $list = DB::select('SELECT * FROM tarefas'); */
        $list = Tarefa::all();
        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        //forma query builder
        $request->validate([
            'titulo' => ['required', 'string']
        ]);

        $titulo = $request->input('titulo');

        /*         DB::insert('INSERT INTO tarefas (titulo)values(:titulo)', [
            'titulo' => $titulo
        ]); */
        $t = new Tarefa;
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.list');
    }
    public function edit($id)
    {
        /*         $list = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]); */
        $list = Tarefa::find($id);

        if ($list) {
            return view('tarefas.edit', [
                'list' => $list
            ]);
        } else {
            return view('notfound');
            //no caso do b7web ele redirect para o tarefas.list
        }
    }

    public function editAction(Request $request, $id)
    {
        // no caso do b7web força a pessoa colocar dados para editar, no meu caso eu não obriguei.
        if ($request->filled('titulo')) {
            $titulo = $request->input('titulo');
        } else {
            $titulo = '';
        }
        /*         DB::update('UPDATE tarefas SET titulo=:titulo WHERE id=:id', [
            'titulo' => $titulo,
            'id' => $id
        ]);
 */
        $t = Tarefa::find($id);
        $t->titulo = $titulo;
        $t->save();

        return redirect()->route('tarefas.list')->with('msg', 'Atualizado com sucesso');
    }

    public function del($id)
    {
        //b7web fez igual ao meu exemplo abaixo
        /*         DB::delete('DELETE FROM tarefas WHERE id=:id', [
            'id' => $id
        ]); */
        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.list');
    }

    public function done($id)
    {
        $list = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);

        if (count($list) > 0) {

            /* $marcador =  $list[0]->resolvido == 0 ? 1 : 0; */

            /*             DB::UPDATE('UPDATE tarefas SET resolvido=:marcador WHERE id=:id', [
                'marcador' => $marcador,
                'id' => $id
            ]); */
            $t = Tarefa::find($id);
            if ($t) {
                $t->resolvido = 1 - $t->resolvido;
                $t->save();
            }

            //ele faz a alternancia na propria query de UPDATE
            /*             DB::UPDATE('UPDATE tarefas SET resolvido= 1 - resolvido WHERE id=:id', [
                'id' => $id
            ]); */

            return redirect()->route('tarefas.list');
        } else {
            return view('notfound');
        }
    }
}
