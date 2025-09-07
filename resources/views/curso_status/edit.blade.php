@extends('layouts.admin')
@section('content')


<div>

    <h2>Editar Status Cursos</h2>

    <a href="{{ route('cursos_statuses.index') }}">Listar</a><br>
    <a href="{{ route('cursos_statuses.show', ['cursosstatus' => $cursosstatus->id]) }}">Visualizar</a><br><br>

 <x-alert-error/>

    <form action="{{ route('cursos_statuses.update', ['cursosstatus' => $cursosstatus->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do status cursos" value="{{ old('name', $cursosstatus->name )}}" />

       <button type="submit">Salvar</button>

    </form>
</div>


@endsection
