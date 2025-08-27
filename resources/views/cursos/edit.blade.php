@extends('layouts.layout')
@section('content')


<div>

    <h2>Editar o Curso</h2>

     <x-alert-error/>
     <x-alert-success/>


    <a href="{{ route('cursos.index') }}">Listar</a><br>
     <a href="{{ route('cursos.show' , ['cursos' => $cursos->id]) }}">Visualizar</a><br>

    {{-- {{ dd($cursos) }} --}}


    <form action="{{ route('cursos.update', ['cursos' => $cursos->id]) }}" method="POST">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name',$cursos->name) }}" required/>

       <button type="submit">Salvar</button>

    </form>
</div>


@endsection
