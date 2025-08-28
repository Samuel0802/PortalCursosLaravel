@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar Status Users</h2>
<br><br><br>

  <x-alert-success/>
  <x-alert-error/>


   <a href="{{ route('status_users.create') }}">Cadastrar Status Users</a><br><br>

    @forelse ($status as $usersStatus)
        ID: {{ $usersStatus->id }}<br>
        NOME: {{ $usersStatus->name }}<br>

        <a href="{{ route('status_users.show', ['status' => $usersStatus->id]) }}">Visualizar</a><br>
        <a href="{{ route('status_users.edit', ['status' => $usersStatus->id]) }}" >Editar</a><br>

        <form action="{{ route('status_users.destroy', ['status' => $usersStatus->id]) }}" method="POST">
           @csrf
         @method('delete')

         <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Excluir</button>

        </form>

        <hr>

    @empty
        <p>Sem Registro de Status</p>
    @endforelse
  <hr>


</div>

@endsection
