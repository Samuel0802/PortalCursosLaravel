@extends('layouts.admin')
@section('content')

    <div>

        <h2>Cadastrar Users</h2>

        <x-alert-error />

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            @method('POST')

            <label>Nome:</label>
            <input type="text" name="name" id="name" placeholder="Digite o Nome Completo"
                value="{{ old('name') }}" /><br><br>

            <label>Login:</label>
            <input type="text" name="login" id="login" placeholder="Digite o login"
                value="{{ old('login') }}" /><br><br>

            <label>Email:</label>
            <input type="text" name="email" id="email" placeholder="Digite o Email"
                value="{{ old('email') }}" /><br><br>

            @can('edit.permissao.users')
                <label>Permissão:</label>
                @forelse ($permissoes as $permissao)
                    {{-- Essa lógica evita que usuários comuns vejam a permissão de Super Admin. --}}
                    @if ($permissao != 'Super Admin' || (auth()->check() && auth()->user()->hasRole('Super Admin')))
                        <input type="checkbox" name="permissoes[]" id="permissao_{{ Str::slug($permissao) }}"
                            value="{{ $permissao }}" {{ collect(old('permissoes'))->contains($permissao) ? 'checked' : '' }}>

                        <label for="permissao_{{ Str::slug($permissao) }}">{{ $permissao }}</label>
                    @endif
                @empty
                    <p>Sem Permissão Disponivel</p>
                @endforelse
                <br><br>
            @endcan


            <label>Senha:</label>
            <input type="password" name="password" id="password" placeholder="Digite sua Senha" /><br><br>

            <label>Confirmar Senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirme sua Senha" /><br><br>


            <button type="submit">Cadastrar</button>

        </form>
        <br><br>
        <a href="{{ route('users.index') }}">Listar Users</a>

    </div>

@endsection
