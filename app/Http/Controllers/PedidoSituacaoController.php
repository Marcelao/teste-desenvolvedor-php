<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoSituacao;

class PedidoSituacaoController extends Controller
{
    //
    public function index()
    {
        $lista_pedidosituacao = new \App\Repositories\PedidoSituacaoDAO(new \App\Models\PedidoSituacao());
        $lista_pedidosituacao = $lista_pedidosituacao->listar();

        $data["resp"] = '';

        return view('cadastro.pedido_situacao.index', $data, compact("lista_pedidosituacao"));
    }

    public function novo()
    {
        return view('cadastro.pedido_situacao.novo');
    }

    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();

        $pedido_situacao = new PedidoSituacao();
        $pedido_situacao->descricao = $request->input('descricao');
        
        try {
            $lista_pedidosituacao = new \App\Repositories\PedidoSituacaoDAO(new \App\Models\PedidoSituacao);
            $lista_pedidosituacao = $lista_pedidosituacao->listar();

            $pedido_situacao->save();

            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cadastro Pedido Situacao com sucesso!</div>"; 
            return redirect('pedido_situacao')->with($data);
        } catch(QueryException $e) {
            $data['resp'] = "<div class='alert alert-danger'>"
                            ."Não possivel cadastrar Pedido Situação!</div>";
            return view('cadastro.pedido_situacao.novo', $data);
        }
    }

    public function editar(Request $request, $id)
    {
        $lista_pedidosituacao = \App\Models\PedidoSituacao::find($id);

        return view('cadastro.pedido_situacao.editar', compact('lista_pedidosituacao'));
    }

    public function atualizar(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $id = $request->input('id');
            $desc_situacao = $request->input('descricao');

            $atualiza_situacao = new \App\Repositories\PedidoSituacaoDAO(new \App\Models\PedidoSituacao());
            $lista_pedidosituacao = $atualiza_situacao->listar_id($id);

            $alt_situacao = \App\Models\PedidoSituacao::find($id);
            $alt_situacao->descricao = $desc_situacao;
            $alt_situacao->save();

            $data["resp"] = "<div class='alert alert-success>"
                            ."Pedido Situação alterado com sucesso!</div>";
            return redirect('pedido_situacao');


        }
    }

    public function deletar(Request $request, $id)
    {
        $proc_situacao = new \App\Repositories\PedidoSituacaoDAO(new \App\Models\PedidoSituacao());
        $proc_situacao = $proc_situacao->listar_id($id);

        $resultado_situacao = PedidoSituacao::find($id)->delete();

        if($resultado_situacao)
        {
            $data["resp"] = "<div class='alert alert-success'>"
                            ."Pedido Situacao deletado com sucesso!</div>";
            return redirect('pedido_situacao');
        } else {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Não foi possivel deletar Pedido Situacao!</div>";
            return view('cadastro.pedido_situacao.index', $data);
        }
    }
}
