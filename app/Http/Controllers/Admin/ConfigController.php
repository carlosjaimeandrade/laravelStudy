<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //blade é o responsavel pelo view
    public function index(Request $request)
    {
        $nome = "Carlos";
        $idade = 90;
        return view('admin/config', ['nome' => $nome, 'idade'=>$idade]);
    }

    public function user()
    {
       return view('teste');
    }
}
