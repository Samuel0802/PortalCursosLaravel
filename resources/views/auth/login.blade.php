@extends('layouts.login')

@section('content')

   <h3>Área Restrita</h3>

   <x-alert-success/>
   <x-alert-error/>

    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        @method('post')

        <label>Login</label>
        <input type="text" name="login" id="login" placeholder="Digite seu Login" value="{{ old('login') }}"/>
        <br> <br>
        <label>Senha</label>
        <input type="password" name="password" id="password" placeholder="Digite sua Senha" value="{{ old('password') }}"/>
          <br> <br>
        <button type="submit">Entrar</button>

    </form>
 <br> <br>
    <a href="{{ route('password.request') }}">Esqueceu a Senha ?</a><br>
    <a href="{{ route('register') }}">Criar Conta</a>


@endsection
