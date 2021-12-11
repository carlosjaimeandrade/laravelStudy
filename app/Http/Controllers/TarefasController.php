<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// inserindo o banco de dados
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{

    //sempre ter um para GET e para
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');

        return view('tarefas.list', [
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }
    
    public function addAction(Request $request){
        if($request->filled('titulo')){
            $titulo = $request->input('titulo');

            DB::insert('INSERT INTO tarefas (titulo)values(:titulo)', [
                'titulo'=> $titulo
            ]);

            return redirect()->route('tarefas.list');
        }else{

        }
    }
    public function edit($id){
   
        var_dump($id);
        $list = DB::select('SELECT * FROM tarefas');
        return view('tarefas.edit');
    }

    public function editAction(){

    }

    public function del(){

    }

    public function done(){

    }


}
