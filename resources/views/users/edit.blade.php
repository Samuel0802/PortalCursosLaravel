@extends('layouts.layout')
@section('content')

<div>

    <h2>Editar Users</h2>

    <a href="{{ route('users.index') }}">Listar Users</a><br>
    <a>Visualizar Users</a><br><br><br>

    <x-alert-error/>
    <br>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name', $user->name) }}" required/><br><br>

         <label>Login:</label>
       <input type="text" name="login" id="login" placeholder="login" value="{{ old('login', $user->login) }}"/><br><br>

         <label>Email:</label>
       <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}"  required/><br><br>

         <label>Matricula:</label>
       <input type="text" name="matricula" id="matricula" placeholder="Matricula" value={{ old('matricula', $user->matricula) }} @disabled(true)/><br><br>

          <label>Nova Senha:</label>
       <input type="password" name="password" id="password" placeholder="Nova Senha" required/><br><br>


       <button type="submit">Salvar</button>

    </form>
</div>

@endsection
