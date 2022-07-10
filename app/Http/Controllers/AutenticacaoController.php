<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\Usuario;

class AutenticacaoController extends Controller
{
    // Acesso Login
    public function login()
    {
        $resp = '';
        return view('auth.login', compact('resp'));        
    }

    // Validar o acesso ao usuario
    public function logar(Request $request)
    {
        $dados = $request->all();

        $email = $dados['email'];
        $senha = md5($dados['senha']);

        $usuario = Usuario::where('email', $email)->first();

        date_default_timezone_set('America/Sao_Paulo');

        if($senha == $usuario['senha'])
        {
            Auth::login($usuario);
            return redirect('dashboard');
        }
        else
        {
            $data["resp"] = "<div class='alert alert-danger'>"
                        . "Usuário não encontrado</div>";
            return view('auth.login', $data);
        }
    }

    // Ir para tela para Registar novo Usuário
    public function registrar()
    {
        $resp = '';
        return view('auth.register', compact('resp'));
    }

    // Acesso ao Cadastro
    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();
        if($request->isMethod("post"))
        {
            $nome = $request->input('nome');
            $email = $request->input('email');
            $senha = md5($request->input('senha'));

            $usuario = \App\Models\Usuario::whereEmail($email)->first();

            if($usuario == null)
            {
                $cad_usuario = new \App\Models\Usuario();
                $cad_usuario->nome  = $nome;
                $cad_usuario->email = $email;
                $cad_usuario->senha = $senha;

                if($cad_usuario->save())
                {
                    $data["resp"] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
                    return redirect()->route('login')->with($data);
                }
                else
                {
                    $data["resp"] = "<div class='alert alert-danger' role='alert'>Não foi possivel cadastrar esse usuário.</div>";
                }
            }
            else
            {
                $data["resp"] = "<div class='alert alert-warning' role='alert'>Desculpe já existe esse usuário cadastrado.</did>";
            }
        }

        return view("auth.register", $data);
    }

    // Sair do Sistema
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
