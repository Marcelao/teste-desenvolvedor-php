@extends('layouts.inicial')

@section('titulo')
    Bem Vindo - Novo Usuário ?
@endsection

@section('conteudo')
<h6 class="font-weight-light">A inscrição é fácil. Leva apenas alguns passos</h6>
{!! $resp !!}
<form class="pt-3" method="POST" action="{{route('salvar')}}">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-lg" id="nome" name="nome" placeholder="Seu Nome" required>
    </div>
    <div class="form-group">
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Senha" required>
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Cadastrar</button>
    </div>
    <div class="text-center mt-4 font-weight-light"> Já tem uma conta? <a href="{{route('login')}}" class="text-primary">Login</a>
    </div>
    {{ csrf_field() }}
</form>
@endsection
