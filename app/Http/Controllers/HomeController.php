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

        //return view('welcome');

    }
}
