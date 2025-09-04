@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar os Modulos</h2>

    <x-alert-success/>

      <a href="{{ route('modulos.create') }}">Cadastrar Modulos</a>

      <br> <br> <br>

      @foreach ($modulos as $modulo)
       Id: {{ $modulo->id }}<br>
       Modulo: {{ $modulo->name }}<br>
       <a href="{{ route('aulas.index', ['modulo' => $modulo->id]) }}">Aulas</a><br>
       <a href="{{ route('modulos.show', ['modulo' => $modulo->id]) }}">Visualizar</a><br>
        <a href="{{ route('modulos.edit', ['modulo' => $modulo->id]) }}">Editar</a><br>

        <form action="{{ route('modulos.destroy', ['modulo' => $modulo->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Excluir</button>
        </form>

       <hr>


      @endforeach

      {{ $modulos->links() }}

</div>

@endsection
