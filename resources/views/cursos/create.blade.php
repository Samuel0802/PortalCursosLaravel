<div>

    <h2>Cadastrar o Curso</h2>

    <x-alert-error/>

    <form action="{{ route('cursos.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
