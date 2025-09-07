@extends('layouts.admin')
@section('content')

<div>

    <h2>Editar Senha </h2>

    <a href="{{ route('users.index') }}">Listar Users</a><br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar Users</a><br>

    <a>Visualizar Users</a><br><br><br>

    <x-alert-error/>
    <x-alert-success/>
    <br>

    <form action="{{ route('users.update_password', ['user' => $user->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name', $user->name) }}" @disabled(true)/><br><br>

        <label>Senha:</label>
       <input type="password" name="password" id="password" placeholder="Nova Senha" /><br><br>

       <button type="submit">Salvar</button>

    </form>
</div>

@endsection
