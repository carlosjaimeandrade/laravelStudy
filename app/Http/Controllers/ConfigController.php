<?php

namespace App\Http\Controllers;

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
