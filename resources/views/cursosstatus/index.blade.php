<div>
    <h2>Listar Status Cursos</h2>

     @if(session('success'))

     <p style="color: greenyellow">{{ session('success') }}</p>

     @endif

      <a href="{{ route('cursosstatus.create') }}">Cadastrar Status do Curso</a>
</div>
