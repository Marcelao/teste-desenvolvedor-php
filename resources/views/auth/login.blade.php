@extends('layouts.inicial')

@section('titulo')
    Bem vindo ao sistema
@endsection

@section('conteudo')
<h6 class="font-weight-light">Faça login para continuar.</h6>
{!! $resp !!}
<form class="pt-3" method="POST" action="{{route('logar')}}">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Senha" required>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Acessar</button>
    </div>
    <div class="text-center mt-4 font-weight-light"> Não tem uma conta? <a href="{{route('registrar')}}" class="text-primary">Criar</a>
    </div>
</form>
@endsection
