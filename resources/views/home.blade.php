@extends('layouts.site')
 @section('content')

    <h1>Bem vindo ao Portal de Cursos</h1>

    <p>Bem-vindo(a), {{ Auth()->user()->name }} </p>


@endsection
