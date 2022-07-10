@extends('layouts.app2')

@section('titulo')
<span class="page-title-icon bg-gradient-primary text-white me-2">
    <i class="mdi mdi-book-minus"></i>
</span> Emissao do Pedido
@endsection


@section('conteudo')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form id="formReg" action="{{route('gerar_pedidos')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">Nome do Cliente</label>
                        <select id="nome_cliente" name="nome_cliente">
                            @foreach($lista_cliente as $cliente)
                                <option value="{{$cliente->nome}}">{{$cliente->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Formas de Pagamento</label>
                        <select name="forma_pagamento" id="forma_pagamento">
                            @foreach($lista_formaspagamento as $formas_pgto)
                                @if($formas_pgto->id == 3)
                                    <option value="{{$formas_pgto->id}}">{{$formas_pgto->descricao}}</option>
                                @endif
                            @endforeach
                        </select>    
                    </div>                   
                    <div class="form-group">
                        <label for="">Loja</lable>
                        <input type="text" class="form-control" id="loja" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Valor da Venda</label>
                        <input type="text" class="form-control" id="vlr_total" name="vlr_total" required>
                    </div>
                    <div class="form-group">
                        <label for="">Quantidade de Parcelas</label>
                        <input type="text" class="form-control" id="qtparcelas" name="qtparcelas" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nome no Cartao</label>
                        <input type="text" class="form-control" id="nm_cartao" name="nm_cartao" required>
                    </div>
                    <div class="form-group">
                        <label for="">Numero do Cartão</label>
                        <input type="text" class="form-control" id="nrcartao" name="nrcartao" required>
                    </div>
                    <div class="form-group">
                        <label for="">Data Vencimento</label>
                        <input type="text" class="form-control" id="dtvencimento_cartao" name="dtvencimento_cartao" required>  
                    </div>
                    <div class="form-group">
                        <label for="">CVC</label>
                        <input type="text" class="form-control" id="nr_cvc" name="nr_cvc" required>  
                    </div>
                    <div class="form-group">
                        <label for="">Situação</label>
                        <select name="situacao_pagamento" id="situacao_pagamento">
                            @foreach($lista_situacao as $list_pgto)
                                <option value="{{$list_pgto->id}}">{{$list_pgto->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection