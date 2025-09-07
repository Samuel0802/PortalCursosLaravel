@extends('layouts.admin')
@section('content')


<div>

    <h2>Cadastrar os Modulos</h2>

    <x-alert-error/>

    <form action="{{ route('modulos.store', ['grupo' => $grupo->id]) }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Modulo" value={{ old('name') }} >

       <button type="submit">Cadastrar</button>

    </form>
</div>

@endsection
