@extends('layouts.admin')
@section('content')

    <div>

        <h2>Editar Turma do Curso</h2>

        <br> <br>
        <a href="{{ route('cursos_grupo.index', ['curso' => $grupo->curso_id]) }}">Listar</a><br>

        @can('edit.turmas')
            {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
               <a href="{{ route('cursos_grupo.show', ['grupo' => $grupo->id]) }}">Visualizar</a><br><br>

        @endcan


        <x-alert-error />


        <form action="{{ route('cursos_grupo.update', ['grupo' => $grupo->id]) }}" method="post">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="name" id="name" placeholder="Nome do Grupo"
                value="{{ old('name', $grupo->name) }}" />

            <button type="submit">Salvar</button>

        </form>
    </div>
@endsection
