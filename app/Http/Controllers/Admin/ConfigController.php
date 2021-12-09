<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //blade é o responsavel pelo view
    public function index(Request $request)
    {


        $lista = ['farinha', 'ovo', 'farinha 2', 'ovo 2'];

        $nome = "Carlos";
        $idade = 90;

        
        $data = [
            'nome' => $nome,
            'idade' => $idade,
            'lista' => $lista
        ];

        return view('admin/config', $data);
    }

    public function user()
    {
        return view('teste');
    }
}
