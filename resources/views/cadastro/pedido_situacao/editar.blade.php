@extends('layouts.app3')

@section('titulo')
<span class="page-title-icon bg-gradient-primary text-white me-2">
    <i class="mdi mdi-book-minus"></i>
</span> Alterar Cadastro
@endsection

@section('conteudo')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Alterar Pedido Situação                         
                </div>
                <div class="card-body">

                <form id="formReg" action="{{route('atualizar_pedidosituacao')}}" method="POST">
                        <!-- @csrf - gera um token que o laravel verifica a autenticidade, isso por usar blade -->
                            {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="{{$lista_pedidosituacao->id}}" hidden>
                        </div>
                        <div class="form-group">
                            <label for="">Gateway</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{$lista_pedidosituacao->descricao}}" required>
                        </div>
                        <a href="{{route('pedido_situacao')}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection