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
                    Alterar Formas de Pagamento                           
                </div>
                <div class="card-body">

                <form id="formReg" action="{{route('atualizar_cliente')}}" method="POST">
                        <!-- @csrf - gera um token que o laravel verifica a autenticidade, isso por usar blade -->
                            {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" value="{{$lista_cliente->id}}" hidden>
                        </div>
                        <div class="form-group">
                            <label for="">Nome do Cliente</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$lista_cliente->nome}}" required>
                        </div>  
                        <div class="form-group">
                            <label for="">CPF / CNPJ</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$lista_cliente->cpf_cnpj}}" required>
                        </div> 
                        <div class="form-group">
                            <label for="">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$lista_cliente->email}}" required>
                        </div> 
                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select id="tipo" name="tipo" name="select">
                                @if($lista_cliente->tipo_pessoa == 'F')
                                    <option value="F" selected="selected">Feminino</option>
                                @elseif($lista_cliente->tipo_pessoa == 'M')
                                    <option value="M" selected="selected">Masculino</option>
                                @else
                                    <option value="F">Feminino</option>
                                    <option value="M">Masculino</option>
                                @endif

                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="">Data Nascimento</label>
                            <input type="text" class="form-control" id="dtnascimento" name="dtnascimento" value="{{$lista_cliente->data_nasc}}" required>
                        </div> 
                        <div class="form-group">
                            <label for="">Loja</label>
                            <input type="text" class="form-control" id="loja" name="loja" value="{{$lista_cliente->id_loja}}" required>
                        </div>  
                        <a href="{{route('cliente')}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection