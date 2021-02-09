<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = $request->get('erro');
        if($erro == 1) {
            $erro = 'Usuário e/ou senha inválidos';
        }
        if($erro == 2) {
            $erro = 'Faça o login para acessar essa página';
        }
        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request) {
        $regras = ['usuario' => 'email', 'senha' => 'required'];
        $feedback = ['usuario.email' => 'Campo obrigatório', 'senha.required' => 'Campo obrigatório'];
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $usuario = new User();

        $user = $usuario->where('email', $email)->where('password', $password)->get()->first();
        
        if(isset($user->name)) {
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;
            return redirect()->route('app.cliente');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
