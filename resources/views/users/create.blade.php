@extends('layouts.layout')
@section('content')

<div>

    <h2>Cadastrar Users</h2>

    <x-alert-error/>

    <form action="{{ route('users.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome" required/><br><br>

         <label>Login:</label>
       <input type="text" name="login" id="login" placeholder="login" required/><br><br>

         <label>Email:</label>
       <input type="text" name="email" id="email" placeholder="Email" required/><br><br>

         <label>Matricula:</label>
       <input type="text" name="matricula" id="matricula" placeholder="Matricula" required/><br><br>

          <label>Senha:</label>
       <input type="password" name="password" id="password" placeholder="Senha" required/><br><br>


       <button type="submit">Cadastrar</button>

    </form>
</div>

@endsection
