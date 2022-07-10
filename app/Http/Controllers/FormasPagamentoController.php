<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormasPagamento;


class FormasPagamentoController extends Controller
{
    // Inicio
    public function index()
    {
        $lista_formaspagamento = new \App\Repositories\FormasPagamentoDAO(new \App\Models\FormasPagamento());
        $lista_formaspagamento = $lista_formaspagamento->listar();

        $data["resp"] = '';

        return view('cadastro.formas_pagamento.index', $data,  compact('lista_formaspagamento'));
    }

    public function novo()
    {
        $data["resp"] = '';

        return view('cadastro.formas_pagamento.novo', $data);
    }

    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();

        $formas_pagamento = new formaspagamento();
        $formas_pagamento->descricao = $request->input('descricao');
        
        try {
            $lista_formaspagamento = new \App\Repositories\FormasPagamentoDAO(new \App\Models\FormasPagamento);
            $lista_formaspagamento = $lista_formaspagamento->listar();

            $formas_pagamento->save();

            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cadastro com sucesso!</div>"; 
            return redirect('formas_pagamento')->with($data);
        } catch(QueryException $e) {
            $data['resp'] = "<div class='alert alert-danger'>"
                            ."Não possivel cadastrar formas Pagamento!</div>";
            return view('cadastro.formas_pagamento.novo', $data);
        }
    }

    public function editar(Request $request, $id)
    {
        $lista_formaspagamento = \App\Models\FormasPagamento::find($id);

        return view('cadastro.formas_pagamento.editar', compact('lista_formaspagamento'));
    }

    public function atualizar(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $id_formapagamento = $request->input('id');
            $desc_forma = $request->input('descricao');

            $atualiza_formas = new \App\Repositories\FormasPagamentoDAO(new \App\Models\FormasPagamento());
            $lista_formaspagamento = $atualiza_formas->listar_id($id_formapagamento);

            $alt_formapagamento = \App\Models\FormasPagamento::find($id_formapagamento);
            $alt_formapagamento->descricao = $desc_forma;
            $alt_formapagamento->save();

            $data["resp"] = "<div class='alert alert-success>"
                            ."Formas de Pagamento alterado com sucesso!</div>";
            return redirect('formas_pagamento');


        }
    }

    public function deletar(Request $request, $id)
    {
        $proc_formaspagamento = new \App\Repositories\FormasPagamentoDAO(new \App\Models\FormasPagamento());
        $proc_formaspagamento = $proc_formaspagamento->listar_id($id);

        $resultado_formaspagamento = FormasPagamento::find($id)->delete();

        if($resultado_formaspagamento)
        {
            $data["resp"] = "<div class='alert alert-success'>"
                            ."Formas de pagamento deletado com sucesso!</div>";
            return redirect('formas_pagamento');
        } else {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Não foi possivel deletar a Formas de Pagamento!</div>";
            return view("cadastro.formas_pagamento_index", $data);
        }
    }
}
