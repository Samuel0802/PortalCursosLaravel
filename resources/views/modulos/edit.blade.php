@extends('layouts.admin')
@section('content')

    <div>

        <h2>Editar os Modulos</h2>
        <br>
        <br>
        <a href="{{ route('modulos.index') }}">Listar</a><br>
        <a href="{{ route('modulos.show', ['modulo' => $modulo->id]) }}">Visualizar</a><br><br>

        <x-alert-error />

        <form action="{{ route('modulos.update', ['modulo' => $modulo->id]) }}" method="post">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="name" id="name" placeholder="Nome do Modulo" value="{{ old('name', $modulo->name) }}" required />

            <button type="submit">Salvar</button>

        </form>
    </div>
@endsection
