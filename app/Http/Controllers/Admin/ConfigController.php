<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConfigController extends Controller
{
    //blade é o responsavel pelo view
    public function index(Request $request)
    {

        // forma de pegar o usuario logado
     /*    $user = Auth::user(); */

     // Segunda forma de pegar os usuarios
        $user = $request->user();
        $nome = $user->name;

/*         if(Gate::allows('se-form')){
            echo "este user pode ver o form";
        }else{
            echo "esse user não pode ver o forma";
        } */

        $lista = ['farinha', 'ovo', 'farinha 2', 'ovo 2'];

       
        $idade = 90;

        //enviando os dados para o view
        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'lista' => $lista,
            'showForm' => Gate::allows('see-form')
        ];

        return view('admin/config', $data);
    }

    public function user()
    {
        return view('teste');
    }
}
