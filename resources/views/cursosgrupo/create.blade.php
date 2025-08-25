<div>

    <h2>Cadastrar o Grupo do Curso</h2>


    <x-alert-error/>


    <form action="{{ route('cursosgrupo.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Grupo" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
