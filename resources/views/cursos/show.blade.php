@extends('layouts.layout')
@section('content')
    <div>
        <h2>Detalhas dos Curso</h2>

        <x-alert-success />


        <a href="{{ route('cursos.index') }}">Listar Cursos</a><br>
        <a href="{{ route('cursos_grupo.index', ['curso' => $cursos->id]) }}">Listar Turmas</a><br>
        <a href="{{ route('cursos.edit', ['cursos' => $cursos->id]) }}">Editar</a><br>
        <br>
        <form action="{{ route('cursos.destroy', ['cursos' => $cursos->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Apagar</button>

        </form><br> <br>

        {{-- Imprimir o registro --}}

        Id: {{ $cursos->id }}<br>
        Nome: {{ $cursos->name }}<br>
        Status: {{ $cursos->cursoStatus?->name ?? 'Sem Status' }}<br>
        Cadastrado: {{ \Carbon\Carbon::parse($cursos->created_at)->format('d/m/Y H:i:s') }}<br>
        Atualizado: {{ \Carbon\Carbon::parse($cursos->updated_at)->format('d/m/Y H:i:s') }}<br>
    </div>
@endsection
