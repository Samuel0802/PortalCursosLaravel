@extends('layouts.admin')
@section('content')
    <div>
        <h2>Listar os cursos</h2>

        <x-alert-success />


        {{-- Can: oculta o link caso user não tenha permissão para acessar a rota --}}
        @can('create.cursos')
            <a href="{{ route('cursos.create') }}">Cadastrar Cursos</a><br><br><br>
        @endcan

        @forelse ($cursos as $curso)
            Id: {{ $curso->id }}<br>
            Nome: {{ $curso->name }}<br>

            @can('index.turmas')
                <a href="{{ route('cursos_grupo.index', ['curso' => $curso->id]) }}">Turmas</a><br>
            @endcan

            @can('show.cursos')
                <a href="{{ route('cursos.show', ['curso' => $curso->id]) }}">Visualizar</a><br>
            @endcan

            @can('edit.cursos')
                <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}">Editar</a><br>
            @endcan

            @can('destroy.cursos')
                <form action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit" onclick="return confirm('Deseja realmente apagar esse registro?')">Apagar</button>

                </form>
            @endcan


            <hr>
        @empty

            <p>Nenhum registro encontrado</p>
        @endforelse

        {{ $cursos->links() }}



    </div>
@endsection
