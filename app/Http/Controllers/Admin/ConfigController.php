<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    // com o request você acessar qual a url qual o method tudo a DE REQUISIÇÃO
    // pode pegar os dados do GET e POST atraves do REQUEST
    public function index(Request $request){
        $url = $request->url();
        $method = $request->method();
        echo "Method: $method";
        echo "<br>";
        echo "URL: $url";
        echo "<br>";

        //pega valor via GET e POST
        // pega todos
        $data = $request->all();
        var_dump($data);

         echo "<br>";
        //pega valor via GET e POST, no input podemos passar o parametro "input('nome') assim dizemos qual 
        // pega requisição do corpo dando prioridade para o POST mas senao tiver pega via GET
        $dados = $request->input();
        var_dump($dados);

        echo "<br>";
        //apenas da url
        $valor = $request->query();
        var_dump($valor);

        echo "<br>";

        // podemos definir um valor como padrao caso não ache
        $cidade = $request->query('cidade', 'sao paulo');
        var_dump($cidade);
        return view('config');
    }

    public function user(){
        echo "pagina inicial do usuario";
    }
}
