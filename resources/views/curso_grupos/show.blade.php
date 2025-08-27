@extends('layouts.layout')
@section('content')
    <div>
        <h2>Visualizar os Grupo Curso</h2>

        <x-alert-success />

        <br>

        <a href="{{ route('cursos_grupo.index') }}">Listar Grupos Cursos</a>

        <br>  <br>  <br>


            ID: {{ $grupo->id }}<br>
            NOME: {{ $grupo->name }}<br>
            Cadastrado: {{ \Carbon\Carbon::parse($grupo->create_at)->format('d/m/Y H:i:s') }}<br>
            Atualizado: {{ \Carbon\Carbon::parse($grupo->update_at)->format('d/m/Y H:i:s') }}<br>

            <hr>

    </div>
@endsection
