@extends('layouts.layout')
@section('content')
    <div>
        <h2>Listar Status Cursos</h2>

        <x-alert-success />
        <x-alert-error />

        <a href="{{ route('cursos_statuses.create') }}">Cadastrar Status do Curso</a>
        <br> <br> <br>

        @foreach ($statusCurso as $status)
            ID: {{ $status->id }}<br>
            NAME: {{ $status->name }}<br>

            <a href="{{ route('cursos_statuses.show', ['cursosstatus' => $status->id]) }}">Visualizar</a><br><br>
            <a href="{{ route('cursos_statuses.edit', ['cursosstatus' => $status->id]) }}">Editar</a><br>

            <form action="{{ route('cursos_statuses.destroy', ['cursosstatus' => $status->id]) }}" method="POST">
             @csrf
             @method('delete')

             <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>

            </form>


            <hr>
        @endforeach


        {{ $statusCurso->links() }}
    </div>
@endsection
