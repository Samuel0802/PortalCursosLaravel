@extends('layouts.layout')
@section('content')

<div>

    <h2>Cadastrar Status Users</h2>

    <a href="{{ route('status_users.index') }}">Listar</a><br>
    <a href="{{ route('status_users.show', ['status' => $status->id]) }}">Visualizar</a><br><br>

    <x-alert-error/>

    <form action="{{ route('status_users.update', ['status' => $status->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Status Users" value="{{ old('name', $status->name) }}" required/>

       <button type="submit">Salvar</button>

    </form>
</div>

@endsection
