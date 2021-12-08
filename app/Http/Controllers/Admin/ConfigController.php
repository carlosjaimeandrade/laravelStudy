<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(){
        echo "pagina inicial de configuração";
    }

    public function user(){
        echo "pagina inicial do usuario";
    }
}
