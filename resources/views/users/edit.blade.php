@extends('layouts.admin')
@section('content')

<div>

    <h2>Editar Users</h2>

    <a href="{{ route('users.index') }}">Listar Users</a><br>
    <a href="{{ route('users.show', ['user' => $user->id]) }}">Visualizar Users</a><br>

<br><br>

    <x-alert-error/>
    <x-alert-success/>
    <br>

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name', $user->name) }}" required/><br><br>

         <label>Login:</label>
       <input type="text" name="login" id="login" placeholder="login" value="{{ old('login', $user->login) }}"/><br><br>

         <label>Email:</label>
       <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}"  required/><br><br>

         @can('edit.permissao.users')
        <label>Permissão:</label>
        @forelse ($roles  as $role)
          {{-- Essa lógica evita que usuários comuns vejam a permissão de Super Admin. --}}

            @if($role != 'Super Admin' || Auth::user()->hasRole('Super Admin'))
              <input type="checkbox" name="roles[]" id="role_{{ Str::slug($role) }}"  value="{{ $role }}"
               {{ in_array($role, old('roles', $userRoles)) ? 'checked' : '' }}
              />
              <label for="role_{{ Str::slug($role) }}">{{ $role }}</label>

            @endif

        @empty
             <p>Sem Permissão Disponivel</p>
        @endforelse
         <br><br>
           @endcan

         <label>Matricula:</label>
       <input type="text" name="matricula" id="matricula" placeholder="Matricula" value={{ old('matricula', $user->matricula) }} @disabled(true)/><br><br>

       <button type="submit">Salvar</button>

    </form>
</div>

@endsection
