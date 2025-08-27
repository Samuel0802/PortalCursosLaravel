@extends('layouts.layout')
@section('content')
    <div>
        <h2>Visualizar Status Users</h2>

        <x-alert-success/>


        <a href="{{ route('status_users.index') }}">Listar Status Users</a><br>
        <a href="{{ route('status_users.edit', ['status' => $status->id]) }}">Editar</a><br>
        <br><br>

        ID: {{ $status->id }}<br>
        NOME: {{ $status->name }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($status->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($status->update_at)->format('d/m/Y H:i:s') }}<br>

        <hr>


    </div>
@endsection
