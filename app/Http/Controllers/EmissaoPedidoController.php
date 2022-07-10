<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormasPagamento;
use App\Models\Cliente;

class EmissaoPedidoController extends Controller
{
    //
    public function index( )
    {
        $lista_formaspagamento = new \App\Repositories\FormasPagamentoDAO(new \App\Models\FormasPagamento());
        $lista_formaspagamento = $lista_formaspagamento->listar();

        $lista_cliente = new \App\Repositories\ClienteDAO(new \App\Models\Cliente());
        $lista_cliente = $lista_cliente->listar();

        $lista_situacao = new \App\Repositories\PedidoSituacaoDAO(new \App\Models\PedidoSituacao());
        $lista_situacao = $lista_situacao->listar(); 
        

        $data["resp"] = "";
        return view('emissaopedido', $data, compact('lista_formaspagamento', 'lista_cliente', 'lista_situacao'));
    }

    public function gerar(Request $request)
    {
        // Capturar os dados para API String 
        
        //dd($request);

        $nome_cliente         = $request->input('nome_cliente');
        $valor_total          = $request->input('vlr_total');
        $card_number          = $request->input('nrcartao');
        $card_cvv             = $request->input('nr_cvc');
        $card_expiration_date = $request->input('dtvencimento_cartao');
        $card_holder_name     = $request->input('nm_cartao');

        $external_id          = '1';
        $name                 = $nome_cliente;
        $type                 = 'I';
        $email                = 'admin@teste.com.br';
        
        $type_doc             = 'cpf';
        
        $birthday             = '';


 
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api11.ecompleto.com.br/exams/processTransaction?accessToken=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdG9yZUlkIjoiNCIsInVzZXJJZCI6Ijg2NzciLCJpYXQiOjE2NTY5MzgzOTEsImV4cCI6MTY1NzU5NDc5OX0.jYUp9lDAH8_UtdBrW2FHBbJTk_ol4h6I4DABsjPUruQ%0A',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "external_order_id": 1,
            "amount": '.$valor_total.',
            "card_number": '.$card_number.',
            "card_cvv": '.$card_cvv.',
            "card_expiration_date": '.$card_cvv.',
            "card_holder_name": '.$card_holder_name.',
            "customer": {
                "external_id": "3311",
                "name": '.$nome_cliente.',
                "type": "individual",
                "email": "mopheus@nabucodonozor.com",
                "documents": [
                    {
                        "type": '.$type_doc.',
                        "number": "30621143049"
                    }
                ],
                "birthday": "1970-01-01"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        dd($response);
    }
}
