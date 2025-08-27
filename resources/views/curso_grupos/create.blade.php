@extends('layouts.layout')
@section('content')


<div>

    <h2>Cadastrar o Grupo do Curso</h2>


    <x-alert-error/>


    <form action="{{ route('cursos_grupo.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Grupo" value="{{ old('name') }}" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>

@endsection
