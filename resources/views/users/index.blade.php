@extends('layouts.layout')
 @section('content')

<div>
    <h2>Listar Users</h2>

    <x-alert-success/>

      <a href="{{ route('users.create') }}">Cadastrar Status Users</a>

      <br><br><br>

      @foreach ($users as $user)
          ID: {{ $user->id }}<br>
          NOME: {{ $user->name }}<br>
          LOGIN: {{ $user->login }}<br>
          EMAIL: {{ $user->email }}<br>
          MATRICULA: {{ $user->matricula }}<br>

          <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br>
          <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a><br>

          <BR>


      @endforeach

</div>

@endsection
