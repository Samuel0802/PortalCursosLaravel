@extends('layouts.admin')
@section('content')

<div>

    <h2>Editar Senha </h2>

    <a href="{{ route('dashboard.index') }}">home</a><br><br>


    <x-alert-error/>
    <x-alert-success/>
    <br>

    <form action="{{ route('profile.update_password', ['user' => $user->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name', $user->name) }}" @disabled(true)/><br><br>

        <label>Nova Senha:</label>
       <input type="password" name="password" id="password" placeholder="Nova Senha" /><br><br>

         <label>Confirmar Senha:</label>
       <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme Nova Senha" /><br><br>

       <button type="submit">Salvar</button>

    </form>
</div>

@endsection
