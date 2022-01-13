<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/config';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(request $request){
        $tries = $request->session()->get('login_tries',0);

        //deletando sessao
        /* $request->session()->forget('login_tries'); */

        return view('login',[
            'tries' => $tries
        ]);
    }

    public function authenticate(Request $request){
        //pegando os campos de email e senha
        // only informo que quero pegar apenas 2 campos da requisição
        $creds = $request->only(['email', 'password']);
        //processo de autenticação
        if(Auth::attempt($creds)){
            $request->session()->put('login_tries', 0);
            return redirect()->route('config.index');
        }else{
            $tries = intVal($request->session()->get('login_tries',0));
            $request->session()->put('login_tries', ++$tries);

            return redirect()->route('login')->with('warning', "email ou senha invalidos");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
