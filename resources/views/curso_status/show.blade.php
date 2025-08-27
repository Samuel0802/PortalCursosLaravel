@extends('layouts.layout')
@section('content')


<div>
    <h2>Visualizar Status Cursos</h2>

   <x-alert-success/>

      <a href="{{ route('cursos_statuses.index') }}">listar Status do Curso</a>
       <br> <br> <br>


     Id: {{ $cursosstatus->id }}<br>
     Nome: {{ $cursosstatus->name }}<br>
     Cadastrado: {{ \Carbon\Carbon::parse($cursosstatus->created_at)->format('d/m/Y H:i:s') }}<br>
     Atualizado: {{ \Carbon\Carbon::parse($cursosstatus->updated_at)->format('d/m/Y H:i:s') }}<br>



     <hr>
</div>


@endsection
