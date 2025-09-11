@extends('layouts.admin')
@section('content')
    <div>
        <h2>Listar os Modulos</h2>

        <x-alert-success />


        @can('create.modulos')
            {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
            <a href="{{ route('modulos.create', ['grupo' => $grupo->id]) }}">Cadastrar Modulos</a><br> <br>
        @endcan



        <br>

        @forelse($modulos as $modulo)
            Id: {{ $modulo->id }}<br>
            Modulo: {{ $modulo->name }}<br>
            <a href="{{ route('modulos.show', ['modulo' => $modulo->id]) }}">Visualizar</a><br>

         @can('edit.modulos')
              <a href="{{ route('modulos.edit', ['modulo' => $modulo->id]) }}">Editar</a><br>
         @endcan

            @can('destroy.modulos')
                <form action="{{ route('modulos.destroy', ['modulo' => $modulo->id]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Excluir</button>
                </form>
            @endcan

            <hr>

        @empty
            <p style="color: red;">
                Nenhum registro encontrado
            </p>
        @endforelse

        {{ $modulos->links() }}

    </div>
@endsection
