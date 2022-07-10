<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LojaGateway;

class LojaGatewayController extends Controller
{
    //
    public function index(Request $request)
    {
        $lista_lojagateway = new \App\Repositories\LojaGatewayDAO(new \App\Models\LojaGateway());
        $lista_lojagateway = $lista_lojagateway->listar();

        $data["resp"] = "";

        return view('cadastro.loja_gateway.index', $data, compact('lista_lojagateway'));
    }

    public function novo()
    {
        return view('cadastro.loja_gateway.novo');
    }

    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();

        $cad_lojagateway             = new LojaGateway();
        $cad_lojagateway->id_loja    = $request->input('loja');
        $cad_lojagateway->id_gateway = $request->input('gateway');
        
        try {
            $lista_lojagateway = new \App\Repositories\LojaGatewayDAO(new \App\Models\LojaGateway());
            $lista_lojagateway = $lista_lojagateway->listar();

            $cad_lojagateway->save();

            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cadastro da Loja Gateway realizado com sucesso!</div>";
            return redirect("loja_gateway");
        } catch(QueryException $e) {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Não foi possivel cadastrar!</div>";
            return view("cadastro.loja_gateway.novo", $data);
        }
    }

    public function editar(Request $request, $id)
    {
        $lista_lojagateway = \App\Models\LojaGateway::find($id);
        return view('cadastro.loja_gateway.editar', compact('lista_lojagateway'));
    }

    public function atualizar(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $id_lojagateway = $request->input('id');
            $id_loja        = $request->input('loja');
            $id_gateway     = $request->input('gateway');

            $alt_lojagateway = \App\Models\LojaGateway::find($id_lojagateway);
            $alt_lojagateway->id_loja = $id_loja;
            $alt_lojagateway->id_gateway = $id_gateway;
            $alt_lojagateway->save();

            $data["resp"] = "<div class='alert alert-success>"
                            ."Alterado com sucesso Loja Gateway!</div>";
            return redirect('loja_gateway')->with($data);
        }
    }

    public function deletar(Request $request, $id)
    {
        $proc_lojagateway = new \App\Repositories\LojaGatewayDAO(new \App\Models\LojaGateway());
        $proc_lojagateway = $proc_lojagateway->listar_id($id);

        $resultado_lojagateway = LojaGateway::find($id)->delete();

        if($resultado_lojagateway) {
            $data["resp"] = "<div class='alert alert-success'>"
                            ."Loja Gateway deletato com sucesso!</div>";
            return redirect('loja_gateway')->with($data);
        } else {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Não foi possivel deletar a Loja Gateway!</div>";
            return view('cadastro.loja_gateway.index', $data);
        }
    }
}
