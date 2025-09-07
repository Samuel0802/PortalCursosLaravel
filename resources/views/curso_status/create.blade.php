@extends('layouts.admin')
@section('content')


<div>

    <h2>Cadastrar Status Cursos</h2>

 <x-alert-error/>

    <form action="{{ route('cursos_statuses.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do status cursos" value="{{ old('name') }}" />

       <button type="submit">Cadastrar</button>

    </form>
</div>


@endsection
