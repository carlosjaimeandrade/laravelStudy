<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// inserindo o banco de dados
use Illuminate\Support\Facades\DB;
// caso deseja destruir a sessao no controller
use Illuminate\Support\Facades\Session;

class TarefasController extends Controller
{

    //sempre ter um para GET e para
    public function list()
    {
      
        $list = DB::select('SELECT * FROM tarefas');

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
        if ($request->filled('titulo')) {
            $titulo = $request->input('titulo');

            DB::insert('INSERT INTO tarefas (titulo)values(:titulo)', [
                'titulo' => $titulo
            ]);

            return redirect()->route('tarefas.list');
        } else {
        }
    }
    public function edit($id)
    {
        $list = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);

        if (count($list) > 0) {
            return view('tarefas.edit', [
                'list' => $list
            ]);
        } else {
            return view('notfound');
        }
    }

    public function editAction(Request $request, $id)
    {
        //criando uma variavel de sessao
        session(['msg' => 'atualizado com sucesso']);
       
        if ($request->filled('titulo')) {
            $titulo = $request->input('titulo');
        }else{
            $titulo = '';
        }

            DB::update('UPDATE tarefas SET titulo=:titulo WHERE id=:id', [
                'titulo' => $titulo,
                'id' => $id
            ]);

            return redirect()->route('tarefas.list');
   
    }

    public function del($id)
    {

        DB::delete('DELETE FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);
        return redirect()->route('tarefas.list');
    }

    public function done($id)
    {
        $list = DB::select('SELECT * FROM tarefas WHERE id=:id', [
            'id' => $id
        ]);

        if (count($list) > 0) {

            $marcador =  $list[0]->resolvido == 0 ? 1 : 0;

            DB::UPDATE('UPDATE tarefas SET resolvido=:marcador WHERE id=:id', [
                'marcador' => $marcador,
                'id' => $id
            ]);
            return redirect()->route('tarefas.list');
        } else {
            return view('notfound');
        }
    }
}
