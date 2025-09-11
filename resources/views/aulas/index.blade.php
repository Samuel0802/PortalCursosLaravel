@extends('layouts.admin')
@section('content')
    <div>
        <h2>Listar as Aulas</h2>

        <x-alert-success />

        <a href="{{ route('modulos.index', ['grupo' => $modulo->curso_grupos_id]) }}">Listar Modulos</a><br>

        @can('create.aulas')
            {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
            <a href="{{ route('aulas.create', ['modulo' => $modulo->id]) }}">Cadastrar Aulas</a><br>
        @endcan


        <br><br>

        @forelse ($aulas as $aula)
            Id: {{ $aula->id }}<br>
            Aula: {{ $aula->name }}<br>
            Módulo: <a href="{{ route('modulos.show', ['modulo' => $modulo->id]) }}">{{ $modulo->name }}</a><br>

            @can('show.aulas')
                <a href="{{ route('aulas.show', ['aula' => $aula->id]) }}"> Visualizar</a><br>
            @endcan

            @can('edit.aulas')
                <a href="{{ route('aulas.edit', ['aula' => $aula->id]) }}"> Editar</a><br>
            @endcan

            @can('destroy.aulas')
                <form action="{{ route('aulas.destroy', ['aula' => $aula->id]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" onclick="return confirm('Deseja realmente excluir?')"> Excluir</button>

                </form>
            @endcan

            <hr>

        @empty

            <p style="color: red">Sem registros de Aulas</p>
        @endforelse

        {{ $aulas->links() }}
    </div>
@endsection
