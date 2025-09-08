@extends('layouts.login')

@section('content')

    <h2>Cadastrar Users</h2>

    <x-alert-error/>

    <form action="{{ route('register.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Digite o Nome Completo" value="{{ old('name') }}"/><br><br>

         <label>Login:</label>
       <input type="text" name="login" id="login" placeholder="Digite Login" value="{{ old('login') }}"/><br><br>

         <label>Email:</label>
       <input type="text" name="email" id="email" placeholder="Digite o seu Melhor Email" value="{{ old('email') }}"/><br><br>


          <label>Senha:</label>
       <input type="password" name="password" id="password" placeholder="Digite Sua Senha" value="{{ old('password') }}"/><br><br>


          <label>Confirmar Senha:</label>
       <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Senha" value="{{ old('password_confirmation') }}"/><br><br>


       <button type="submit">Cadastrar</button>

    </form>
   <br><br>
     <a href="{{ route('login') }}">Login</a>
</div>


@endsection
