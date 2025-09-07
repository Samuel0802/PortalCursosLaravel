@extends('layouts.admin')
@section('content')


    <div>
        <h2>Detalhas dos Curso</h2>

        <x-alert-success />


        <a href="{{ route('cursos.index') }}">Listar Cursos</a><br>
        <a href="{{ route('cursos_grupo.index', ['curso' => $curso->id]) }}">Listar Turmas</a><br>
        <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}">Editar</a><br>
        <br>
        <form action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Apagar</button>

        </form><br> <br>

        {{-- Imprimir o registro --}}

        Id: {{ $curso->id }}<br>
        Nome: {{ $curso->name }}<br>
        Status: {{ $curso->cursoStatus?->name ?? 'Sem Status' }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($curso->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($curso->updated_at)->format('d/m/Y H:i:s') }}<br>
    </div>
@endsection
