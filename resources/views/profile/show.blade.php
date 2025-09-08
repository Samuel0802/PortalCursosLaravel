@extends('layouts.admin')
@section('content')

<div>
    <h2>Perfil</h2>

    <x-alert-success/>

      <a href="{{ route('profile.edit', ['user' => $user->id]) }}">Editar Meu Perfil</a><br>
      <a href="{{ route('profile.edit_password', ['user' => $user->id]) }}">Editar Senha</a><br>

      <br>
          Id: {{ $user->id }}<br>
          Nome: {{ $user->name }}<br>
          Login: {{ $user->login }}<br>
          Email: {{ $user->email }}<br>
          Matricula: {{ $user->matricula }}<br>
          Status: {{ $user->userStatus?->name ?? 'Sem status' }}<br>

          <BR>



</div>

@endsection
