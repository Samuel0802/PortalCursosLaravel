@extends('layouts.login')

@section('content')

   <h3>Recuperar a Senha</h3>

   <x-alert-success/>
   <x-alert-error/>

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        @method('post')

        <label>Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail cadastrado" value="{{ old('email') }}"/>
        <br> <br>

        <button type="submit">Recuperar</button>

    </form>
 <br> <br>

    <a href="{{ route('login') }}">Login</a>


@endsection
