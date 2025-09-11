@extends('layouts.admin')
@section('content')
    <div>
        <h2>Detalhes das Turmas</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos_grupo.index', ['curso' => $grupo->curso_id]) }}">Listar </a><br>
        <a href="{{ route('modulos.index', ['grupo' => $grupo->id]) }}">Listar modulos </a><br>

        @can('edit.turmas')
            {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
            <a href="{{ route('cursos_grupo.edit', ['grupo' => $grupo->id]) }}">Editar</a><br><br>
        @endcan

        <br>


        ID: {{ $grupo->id }}<br>
        NOME: {{ $grupo->name }}<br>
        CURSO: {{ $grupo->curso?->name ?? 'Sem Curso' }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($grupo->create_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($grupo->update_at)->format('d/m/Y H:i:s') }}<br>

        <hr>

    </div>
@endsection
