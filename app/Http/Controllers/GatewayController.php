<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gateways;


class GatewayController extends Controller
{
    //Inicio 
    public function index()
    {
        $lista_gateways = new \App\Repositories\GatewaysDAO(new \App\Models\Gateways());
        $lista_gateways = $lista_gateways->listar();

        $data["resp"] = "";
 
        return view("cadastro.gateway.index", $data, compact('lista_gateways'));
    }

    //Ir para Tela do Cadastro
    public function novo()
    {
        return view('cadastro.gateway.novo');
    }

    public function salvar(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $dados = $request->all();
        $data = array();

        $cad_gateways = new gateways();
        $cad_gateways->descricao = $request->input('descricao');
        $cad_gateways->endpoint  = $request->input('endpoint');

        try{
            $lista_gateways = new \App\Repositories\GatewaysDAO(new \App\Models\Gateways);
            $lista_gateways = $lista_gateways->listar();

            $cad_gateways->save();

            $data["resp"] = "<div class='alert alert-success'>"
                            ."Cadastro com sucesso!</div>";
            return redirect('gateway')->with($data);
        } catch(QueryException $e) {
            $data["resp"] = "<div class='alert alert-dander'>"
                            ."Não foi possivel cadastrar esse Gateways!</div>";
            return view('cadastro.gateway.novo', $data);
        }
    }

    public function editar(Request $request, $id)
    {
        $lista_gateways = \App\Models\Gateways::find($id);
        return view('cadastro.gateway.editar', compact('lista_gateways'));
    }

    public function atualizar(Request $request)
    {
        if($request->isMethod("POST"))
        {
            $id_gateways = $request->input('id');
            $descricao   = $request->input('descricao');
            $endpoint    = $request->input('endpoint');

            /*$atualiza_gateways = new \App\Repositories\GatewaysDAO(new \App\Models\Gateways());
            $lista_gateways = $atualiza_gateways->listar_id($id_gateways);*/

            $alt_gateways = \App\Models\Gateways::find($id_gateways);
            $alt_gateways->descricao = $descricao;
            $alt_gateways->endpoint  = $endpoint;
            $alt_gateways->save();

            $data["resp"] = "<div class='alert alert-success>"
                            ."Gateways Alterado com sucesso!</div>";
            return redirect('gateway');
        }
    }

    public function deletar(Request $request, $id)
    {
        $proc_gateways = new \App\Repositories\GatewaysDAO(new \App\Models\Gateways());
        $proc_gateways = $proc_gateways->listar_id($id);        

        $resultado_gateways = Gateways::find($id)->delete();
 
        if($resultado_gateways) {
            $data["resp"] = "<div class='alert alert-success'>"
                            ."Gateways deletado com sucesso!</div>";
            return redirect('gateway');
        } else {
            $data["resp"] = "<div class='alert alert-danger'>"
                            ."Gateways não foi deletado!</div>";
            return view('cadastro.gateway.index', $data);
        }
    }

}
