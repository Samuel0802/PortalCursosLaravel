@extends('layouts.admin')
@section('content')
    <div>
        <h2>Detalhes dos Modulos</h2>

        <x-alert-success />

        <a href="{{ route('modulos.index', ['grupo' => $modulo->curso_grupos_id]) }}">Listar Modulos</a><br>
        <a href="{{ route('aulas.index', ['modulo' => $modulo->id]) }}">Listar Aulas</a><br>

        @can('edit.modulos')
         {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
            <a href="{{ route('modulos.edit', ['modulo' => $modulo->id]) }}">Editar Modulos</a><br>
        @endcan

        <br> <br>


        Id: {{ $modulo->id }}<br>
        Modulo: {{ $modulo->name }}<br>
        Turma: <a
            href="{{ route('cursos_grupo.show', ['grupo' => $modulo->cursosGrupo->id]) }}">{{ $modulo->cursosGrupo?->name ?? 'Sem Turma' }}</a><br>
        Cadastro: {{ \Carbon\Carbon::parse($modulo->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($modulo->updated_at)->format('d/m/Y H:i:s') }}<br>

        <hr>



    </div>
@endsection
