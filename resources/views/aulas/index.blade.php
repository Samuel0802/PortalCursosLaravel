@extends('layouts.admin')
@section('content')

<div>
    <h2>Listar as Aulas</h2>

    <x-alert-success/>

     <a href="{{ route('modulos.index', ['grupo' => $modulo->curso_grupos_id]) }}">Listar Modulos</a><br>
      <a href="{{ route('aulas.create', ['modulo' => $modulo->id]) }}">Cadastrar Aulas</a>

 <br><br><br>

      @forelse ($aulas as $aula)
         Id: {{ $aula->id }}<br>
         Nome: {{ $aula->name }}<br>

         <a href="{{ route('aulas.show' , ['aula' => $aula->id]) }}"> Visualizar</a><br>
          <a href="{{ route('aulas.edit' , ['aula' => $aula->id]) }}"> Editar</a><br>

           <form action="{{ route('aulas.destroy', ['aula' => $aula->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente excluir?')"> Excluir</button>

           </form>

         <hr>

      @empty

        <p style="color: red">Sem registros de Aulas</p>

      @endforelse

      {{ $aulas->links() }}
</div>

@endsection
