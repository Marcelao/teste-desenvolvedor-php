@extends('layouts.app2')

@section('titulo')
<span class="page-title-icon bg-gradient-primary text-white me-2">
    <i class="mdi mdi-book-minus"></i>
</span> Novo Cadastro 
@endsection

@section('conteudo')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Inserir Novo Cliente                         
                </div>
                <div class="card-body">

                <form id="formReg" action="{{route('salvar_cliente')}}" method="POST">
                        <!-- @csrf - gera um token que o laravel verifica a autenticidade, isso por usar blade -->
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nome do Cliente</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>  
                        <div class="form-group">
                            <label for="">CPF / CNPJ</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" required>
                        </div> 
                        <div class="form-group">
                            <label for="">E-Mail</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div> 
                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select id="tipo" name="tipo" name="select">
                                <option >Selecione a opção</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="">Data Nascimento</label>
                            <input type="text" class="form-control" id="dtnascimento" name="dtnascimento" required>
                        </div> 
                        <div class="form-group">
                            <label for="">Loja</label>
                            <input type="text" class="form-control" id="loja" name="loja" required>
                        </div> 
                        <a href="{{route('cliente')}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection