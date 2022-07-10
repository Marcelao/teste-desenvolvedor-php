@extends('layouts.app2')

@section('titulo')
<span class="page-title-icon bg-gradient-primary text-white me-2">
    <i class="mdi mdi-book-minus"></i>
</span> Loja Gateway
@endsection

@section('conteudo')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Loja Gateways</h4>
                <div class="col-lg-6 col-1"> 
                  <a href="{{route('novo_lojagateways')}}" class="nav-link text-body font-weight-bold px-0">
                      <i class="fa fa-user me-sm-1"></i>
                      <span class="d-sm-inline d-none">Novo Cadastro</span>
                  </a>
                </div> 

                {!! $resp !!}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Loja </th>
                                <th> Gateway </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lista_lojagateway as $lista)
                            <tr>
                                <td>{{$lista->id}}</td>
                                <td>{{$lista->id_loja}}</td>
                                <td>{{$lista->id_gateway}}</td>
                                <td>
                                    <a href="{{ route('editar_lojagateways', ['id' => $lista['id']]) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route('deletar_lojagateways',['id' => $lista['id']]) }}" class="btn btn-danger btn-sm">Excluir</a>         
                                </td>
                            </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection