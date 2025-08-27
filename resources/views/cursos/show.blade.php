@extends('layouts.layout')
@section('content')


<div>
    <h2>Detalhas dos Curso</h2>

    <x-alert-success />


      <a href="{{ route('cursos.index') }}">Listar Cursos</a>
      <br><br>  <br>

       {{-- Imprimir o registro --}}

            Id: {{ $cursos->id }}<br>
            Nome: {{ $cursos->name }}<br>
            Cadastrado: {{ \Carbon\Carbon::parse($cursos->created_at)->format('d/m/Y H:i:s')}}<br>
            Atualizado: {{ \Carbon\Carbon::parse($cursos->updated_at)->format('d/m/Y H:i:s') }}<br>
</div>

@endsection
