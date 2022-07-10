<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    //
    public function index(Request $request)
    {
        $lista_cliente = new \App\Repositories\ClienteDAO(new \App\Models\Cliente());
        $lista_cliente = $lista_cliente->listar();

        $data["resp"] = '';

        return view('cadastro.cliente.index', $data, compact("lista_cliente"));
    }

    public function novo()
    {
        return view('cadastro.cliente.novo');
    }

    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();

        $cad_cliente              = new Cliente();
        $cad_cliente->nome        = $request->input('nome');
        $cad_cliente->cpf_cnpj    = $request->input('cpf_cnpj');
        $cad_cliente->email       = $request->input('email');
        $cad_cliente->tipo_pessoa = $request->input('tipo');
        $cad_cliente->data_nasc   = $request->input('dtnascimento');
        $cad_cliente->id_loja     = $request->input('loja');

        try {
            $lista_cliente = new \App\Repositories\ClienteDAO(new \App\Models\Cliente);
            $lista_cliente = $lista_cliente->listar();

            $cad_cliente->save();

            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cliente cadastrado com sucesso!</div>";
            return redirect('cliente')->with($data);
        } catch(QueryException $e) {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Não foi possivel cadastrar o cliente!</div>";
            return view("cadastro.cliente.novo", $data);
        }
    }

    public function editar(Request $request, $id)
    {
        $lista_cliente = \App\Models\Cliente::find($id);
        return view('cadastro.cliente.editar', compact('lista_cliente'));
    }

    public function atualizar(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $id       = $request->input('id');
            $nome     = $request->input('nome');
            $cpf_cnpj = $request->input('cpf_cnpj');
            $email    = $request->input('email');
            $tipo     = $request->input('tipo');
            $loja     = $request->input('loja');

            $atualiza_cliente = new \App\Repositories\ClienteDAO(new \App\Models\Cliente());
            $lista_cliente = $atualiza_cliente->listar_id($id);

            $alt_cliente = \App\Models\cliente::find($id);
            $alt_cliente->nome         = $nome;
            $alt_cliente->cpf_cnpj     = $cpf_cnpj;
            $alt_cliente->email        = $email;
            $alt_cliente->tipo_pessoa  = $tipo;
            $alt_cliente->id_loja      = $loja;
            $alt_cliente->save();

            $data["resp"] = "<div class='alert alert-success>"
                            ."Cliente alterado com sucesso!</div>";
            return redirect('cliente');


        }
    }

    public function deletar(Request $request, $id)
    {
        $proc_cliente = new \App\Repositories\ClienteDAO(new \App\Models\Cliente());
        $proc_cliente = $proc_cliente->listar_id($id);

        $resultado_cliente = Cliente::find($id)->delete();

        if($resultado_cliente)
        {
            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cliente deletado com sucesso!</div>";
            return redirect('cliente');
        } else {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Cliente não foi possivel deletar!</div>";
            return view('cadastro.cliente.index', $data);
        }
    }
}
