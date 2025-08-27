@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar Status Users</h2>
<br><br><br>

    @forelse ($status as $usersStatus)
        ID: {{ $usersStatus->id }}<br>
        NOME: {{ $usersStatus->name }}<br>

        <a href="{{ route('status_users.show', ['status' => $usersStatus->id]) }}">Visualizar</a><br><br>


    @empty
        <p>Sem Registro de Status</p>
    @endforelse

    <x-alert-success/>
  <hr>
      <a href="{{ route('status_users.create') }}">Cadastrar Status Users</a>

</div>

@endsection
