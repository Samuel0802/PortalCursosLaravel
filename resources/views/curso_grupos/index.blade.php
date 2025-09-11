@extends('layouts.admin')
@section('content')
    <div>
        <h2>Listar as Turmas</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos.index') }}">Listar os Cursos</a><br>


        @can('create.turmas')
            {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
            <a href="{{ route('cursos_grupo.create', ['curso' => $curso->id]) }}">Cadastrar Turma</a> <br>
        @endcan

        <br> <br>

        @forelse ($grupos as $grupo)
            Id: {{ $grupo->id }}<br>

            @can('index.turmas')
             Turma: {{ $grupo->name }}<br>
            @endcan

            Cursos:<a href="{{ route('cursos.show', ['curso' => $curso->id]) }}">{{ $curso->name }}</a><br>

            @can('index.modulos')
                 <a href="{{ route('modulos.index', ['grupo' => $grupo->id]) }}">Modulos</a><br>
            @endcan

            @can('show.turmas')
                <a href="{{ route('cursos_grupo.show', ['grupo' => $grupo->id]) }}">Visualizar</a><br>
            @endcan

             @can('edit.turmas')

                  <a href="{{ route('cursos_grupo.edit', ['grupo' => $grupo->id]) }}">Editar</a><br>

             @endcan

             @can('destroy.turmas')

               <form action="{{ route('cursos_grupo.destroy', ['grupo' => $grupo->id]) }}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>

                </fomr>

             @endcan

                <hr>

            @empty

                <p style="color: red">Sem Registros de Turma</p>
        @endforelse

        {{ $grupos->links() }}
    </div>
@endsection
