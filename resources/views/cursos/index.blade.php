@extends('layouts.admin')
@section('content')


<div>
    <h2>Listar os cursos</h2>

    <x-alert-success />


      <a href="{{ route('cursos.create') }}">Cadastrar Cursos</a>
      <br><br>  <br>

       @forelse ($cursos as $curso)
            Id: {{ $curso->id }}<br>
            Nome: {{ $curso->name }}<br>

             <a href="{{ route('cursos_grupo.index', ['curso' => $curso->id]) }}">Turmas</a><br>
             <a href="{{ route('cursos.show', ['curso' => $curso->id]) }}">Visualizar</a><br>
             <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}">Editar</a><br>

             <form action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" method="POST">
             @csrf
             @method('delete')

              <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Apagar</button>

             </form>

            <hr>
       @empty

         <p>Nenhum registro encontrado</p>

       @endforelse

       {{ $cursos->links() }}



</div>

@endsection
