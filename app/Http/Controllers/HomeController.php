<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importando model
use App\Models\Tarefa;

class HomeController extends Controller
{
    public function index()
    {
        // traz tudo do bd
        $list = Tarefa::all();

        // query com parametro
        /* $list = Tarefa::where('resolvido', 0)->get(); */

        // pega o primeiro item
        /* $list = Tarefa::where('resolvido', 0)->first(); */

        // query com 2 comdições isso com *AND*
        $list = Tarefa::where('resolvido', 0)->where('titulo', '1')->get();

        // query com 2 comdições isso com *OR*
        $list = Tarefa::where('resolvido', 0)->orWhere('titulo', '1')->get();

        foreach ($list as $item) {
            echo $item->titulo . "<br>";
        }

        //procura o item pelo id retornaod 1 valor
        $item = Tarefa::find(11);
        echo $item->titulo . "<br>";


        //procura o item pelo id retornaod 1 ou mais valores
        $list = Tarefa::find([11, 8]);
        foreach ($list as $item) {
            echo $item->titulo . "<br>";
        }

        // contando o total de registros
        $total = Tarefa::where('resolvido', 1)->count();
        echo $total;

        // inserindo um valor na tabela
        $t = new Tarefa;
        $t->titulo = 'testando pelo eloquent';
        $t->save();

        //editando um item;
        $t = Tarefa::find(11);
        $t->titulo = 'Dormir';
        $t->save();

        // removendo um item pelo
        /* $t = Tarefa::find(7);
        $t->delete(); */

        //editando em massa 
        Tarefa::where('resolvido', 0)->update([
            'resolvido' => 1
        ]);

        //excluindo em massa
        /* Tarefa::where('resolvido', 0)->delete([
            'resolvido' => 1
        ]); */

        //return view('welcome');


    }
}
