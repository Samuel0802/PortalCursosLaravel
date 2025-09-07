@extends('layouts.layout')
@section('content')


<div>

    <h2>Editar o Curso</h2>

     <x-alert-error/>
     <x-alert-success/>


    <a href="{{ route('cursos.index') }}">Listar</a><br>
     <a href="{{ route('cursos.show' , ['curso' => $curso->id]) }}">Visualizar</a><br><br><br>

    {{-- {{ dd($cursos) }} --}}


    <form action="{{ route('cursos.update', ['curso' => $curso->id]) }}" method="POST">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name', $curso->name) }}" />

       <button type="submit">Salvar</button>

    </form>
</div>


@endsection
