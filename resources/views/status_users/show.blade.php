@extends('layouts.layout')
@section('content')


<div>
    <h2>Visualizar Status Users</h2>


  <a href="{{ route('status_users.index') }}">Listar Status Users</a>
<br><br>

        ID: {{ $status->id }}<br>
        NOME: {{ $status->name }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($status->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($status->update_at)->format('d/m/Y H:i:s') }}<br>


    <x-alert-success/>
  <hr>


</div>

@endsection
