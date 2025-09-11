@extends('layouts.admin')
@section('content')
    <div>
        <h2>Listar Users</h2>

        <x-alert-success />

        @can('create.users')
             <a href="{{ route('users.create') }}">Cadastrar Users</a><br>
        @endcan

        <br>

        @foreach ($users as $user)
            ID: {{ $user->id }}<br>
            NOME: {{ $user->name }}<br>
            LOGIN: {{ $user->login }}<br>
            EMAIL: {{ $user->email }}<br>
            MATRICULA: {{ $user->matricula }}<br>

            @can('show.users')
                <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar</a><br>
            @endcan

            @can('edit.users')
                <a href="{{ route('users.edit', ['user' => $user->id]) }}">Editar</a><br>
            @endcan

            @can('destroy.users')
                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('delete')

                    <button type="submit">Excluir</button>

                </form>
                <br>

            @endcan
               <hr>
        @endforeach

        {{ $users->links() }}

    </div>
@endsection
