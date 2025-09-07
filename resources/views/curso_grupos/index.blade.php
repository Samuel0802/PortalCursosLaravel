@extends('layouts.admin')
@section('content')

    <div>
        <h2>Listar as Turmas</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos.index') }}">Listar os Cursos</a><br>
        <a href="{{ route('cursos_grupo.create', ['curso' => $curso->id]) }}">Cadastrar Turma</a>

        <br>  <br>  <br>

        @forelse ($grupos as $grupo)
            Id: {{ $grupo->id }}<br>
            Turma: {{ $grupo->name }}<br>
            Cursos:<a href="{{  route('cursos.show', ['curso' => $curso->id]) }}">{{ $curso->name }}</a><br>
            <a href="{{ route('modulos.index', ['grupo' => $grupo->id]) }}">Modulos</a><br>
            <a href="{{ route('cursos_grupo.show', ['grupo' => $grupo->id]) }}" >Visualizar</a><br>
            <a href="{{ route('cursos_grupo.edit', ['grupo' => $grupo->id]) }}" >Editar</a><br>

            <form action="{{ route('cursos_grupo.destroy', ['grupo' => $grupo->id]) }}" method="POST">
                @csrf
                @method('delete')

               <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>

            </fomr>

            <hr>

        @empty

         <p style="color: red">Sem Registros de Turma</p>

        @endforelse

        {{ $grupos->links() }}
    </div>
@endsection
