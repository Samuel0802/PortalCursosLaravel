@extends('layouts.login')
@section('content')

<div>

    <h2>Nova Senha</h2>


    <x-alert-error/>
    <x-alert-success/>
    <br>

    <form action="{{ route('password.update') }}" method="post">
       @csrf
       @method('POST')

       <input type="hidden" name="token" id="token" value="{{ $token }}"/>


       <label>Email:</label>
       <input type="text" name="email" id="email"  value="{{ old('email', request()->query('email')) }}" readonly/><br><br>

        <label>Nova Senha:</label>
       <input type="password" name="password" id="password" placeholder="Nova Senha" /><br><br>

         <label>Confirmar Senha:</label>
       <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme Nova Senha" /><br><br>

       <button type="submit">Atualizar</button>

    </form>

     <br><br>
     <a href="{{ route('login') }}">Login</a>
</div>

@endsection
