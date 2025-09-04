@extends('layouts.layout')
@section('content')
    <div>
        <h2>Visualizar as Turma Curso</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos_grupo.index') }}">Listar </a><br>
        <a href="{{ route('cursos_grupo.edit', ['grupo' => $grupo->id]) }}">Editar</a><br>

        <br>  <br>  <br>


            ID: {{ $grupo->id }}<br>
            NOME: {{ $grupo->name }}<br>
            CURSO: {{ $grupo->curso?->name ?? 'Sem Curso'}}<br>
            Cadastrado: {{ \Carbon\Carbon::parse($grupo->create_at)->format('d/m/Y H:i:s') }}<br>
            Atualizado: {{ \Carbon\Carbon::parse($grupo->update_at)->format('d/m/Y H:i:s') }}<br>

            <hr>

    </div>
@endsection
