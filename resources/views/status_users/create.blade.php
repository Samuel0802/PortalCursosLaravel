@extends('layouts.admin')
@section('content')

    <div>

        <h2>Cadastrar Status Users</h2>

        <x-alert-success />
        <x-alert-error />

        <form action="{{ route('status_users.store') }}" method="post">
            @csrf
            @method('POST')

            <label>Nome:</label>
            <input type="text" name="name" id="name" placeholder="Nome do Status Users"  />

            <button type="submit">Cadastrar</button>

        </form>
    </div>
@endsection
