@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar Status Cursos</h2>

   <x-alert-success/>

      <a href="{{ route('cursos_statuses.create') }}">Cadastrar Status do Curso</a>
       <br> <br> <br>

       @foreach ($statusCurso  as $status )

     ID: {{ $status->id }}<br>
     NAME: {{ $status->name }}<br>

     <a href="{{ route('cursos_statuses.show', ['cursosstatus' => $status->id]) }}">Visualizar</a>

     <hr>

    @endforeach
</div>


@endsection
