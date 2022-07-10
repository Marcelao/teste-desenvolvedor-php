@extends('layouts.app2')

@section('titulo')
<span class="page-title-icon bg-gradient-primary text-white me-2">
    <i class="mdi mdi-book-minus"></i>
</span> Loja Gateway - Novo
@endsection

@section('conteudo')
<div class="container"><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Inserir - Loja Gateways                            
                </div>
                <div class="card-body">

                <form id="formReg" action="{{route('salvar_lojagateways')}}" method="POST">
                        <!-- @csrf - gera um token que o laravel verifica a autenticidade, isso por usar blade -->
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Loja</label>
                            <input type="text" class="form-control" id="loja" name="loja" required>
                        </div>  
                        <div class="form-group">
                            <label for="">Gateway</label>
                            <input type="text" class="form-control" id="gateway" name="gateway" required>
                        </div>
                        <a href="{{route('loja_gateway')}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection