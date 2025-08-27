@extends('layouts.layout')
@section('content')


<div>
    <h2>Listar os Modulos</h2>

    <x-alert-success/>

      <a href="{{ route('modulos.index') }}">Listar Modulos</a>

      <br> <br> <br>


       ID: {{ $modulo->id }}<br>
       NOME: {{ $modulo->name }}<br>
       Cadastro: {{ \Carbon\Carbon::parse($modulo->created_at)->format('d/m/Y H:i:s')}}<br>
       Atualizado: {{ \Carbon\Carbon::parse($modulo->updated_at)->format('d/m/Y H:i:s') }}<br>

       <hr>



</div>

@endsection
