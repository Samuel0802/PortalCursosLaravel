@extends('layouts.layout')
@section('content')
    <div>
        <h2>Listar os Grupo Curso</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos_grupo.create') }}">Cadastrar Grupos</a>

        <br>  <br>  <br>

        @foreach ($grupos as $grupo)
            ID: {{ $grupo->id }}<br>
            NOME: {{ $grupo->name }}<br>
            <a href="{{ route('cursos_grupo.show', ['grupo' => $grupo->id]) }}" >Visualizar</a><br>
            <a href="{{ route('cursos_grupo.edit', ['grupo' => $grupo->id]) }}" >Editar</a><br>
            <hr>
        @endforeach
    </div>
@endsection
