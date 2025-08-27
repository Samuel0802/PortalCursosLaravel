@extends('layouts.layout')
@section('content')
    <div>

        <h2>Editar Grupo do Curso</h2>

        <br> <br>
        <a href="{{ route('cursos_grupo.index') }}">Listar</a><br>
        <a href="{{ route('cursos_grupo.show', ['grupo' => $grupo->id]) }}">Visualizar</a><br><br>


        <x-alert-error />


        <form action="{{ route('cursos_grupo.update', ['grupo' => $grupo->id]) }}" method="post">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="name" id="name" placeholder="Nome do Grupo"
                value="{{ old('name', $grupo->name) }}" required />

            <button type="submit">Salvar</button>

        </form>
    </div>
@endsection
