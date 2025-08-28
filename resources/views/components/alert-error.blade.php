<div>

    {{-- Mensagem de erro enviada via session --}}
    @if (session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    {{-- Erro da validação do formulário --}}
    @if($errors->any())

     <p style="color: #f00">

        @foreach ($errors->all() as $error)
        {{ $error }}<br>

        @endforeach
     </p>

    @endif

</div>
