@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar os cursos</h2>

    <x-alert-success />


      <a href="{{ route('cursos.create') }}">Cadastrar Cursos</a>
      <br><br>  <br>

       @forelse ($cursos as $curso)
            Id: {{ $curso->id }}<br>
            Nome: {{ $curso->name }}<br>

             <a href="{{ route('cursos.show', ['cursos' => $curso->id]) }}">Visualizar</a>

            <hr>
       @empty

         <p>Nenhum registro encontrado</p>

       @endforelse

</div>

@endsection
