@extends('layouts.admin')
@section('content')

<div>
    <h2>Listar Users</h2>

    <x-alert-success/>

      <a href="{{ route('users.index') }}">Listar Users</a><br>

      @can('edit.users')
         <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar Users</a><br>
      @endcan

       @can('edit_password.users')
             <a href="{{ route('users.edit_password', ['user' => $user->id]) }}">Editar Senha</a><br>
       @endcan

<br><br>

          ID: {{ $user->id }}<br>
          NOME: {{ $user->name }}<br>
          LOGIN: {{ $user->login }}<br>
          EMAIL: {{ $user->email }}<br>
          MATRICULA: {{ $user->matricula }}<br>
          STATUS: {{ $user->userStatus?->name ?? 'Sem status' }}<br>
          Cadastrado: {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}<br>
          Atualizado: {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}<br>

          <br>



</div>

@endsection
