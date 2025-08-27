@extends('layouts.layout')
 @section('content')

<div>
    <h2>Listar Users</h2>

    <x-alert-success/>

      <a href="{{ route('users.index') }}">Listar Users</a>

      <br><br><br>

          ID: {{ $user->id }}<br>
          NOME: {{ $user->name }}<br>
          LOGIN: {{ $user->login }}<br>
          EMAIL: {{ $user->email }}<br>
          MATRICULA: {{ $user->matricula }}<br>
          Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
          Atualizado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>

          <BR>



</div>

@endsection
