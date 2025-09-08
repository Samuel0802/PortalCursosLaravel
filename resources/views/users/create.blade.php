@extends('layouts.admin')
@section('content')

<div>

    <h2>Cadastrar Users</h2>

    <x-alert-error/>

    <form action="{{ route('users.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Digite o Nome Completo" /><br><br>

         <label>Login:</label>
       <input type="text" name="login" id="login" placeholder="Digite o login" /><br><br>

         <label>Email:</label>
       <input type="text" name="email" id="email" placeholder="Digite o Email" /><br><br>

          <label>Senha:</label>
       <input type="password" name="password" id="password" placeholder="Digite sua Senha" /><br><br>

       <label>Confirmar Senha:</label>
       <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua Senha" /><br><br>


       <button type="submit">Cadastrar</button>

    </form>
    <br><br>
    <a href="{{ route('users.index') }}">Listar Users</a>

</div>

@endsection
