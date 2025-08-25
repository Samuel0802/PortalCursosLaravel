<div>

    <h2>Cadastrar Status Cursos</h2>

    @if(session('error'))

    <p style="color: red">{{ session('error') }}</p>

    @endif

    <form action="{{ route('cursosstatus.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do status cursos" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
