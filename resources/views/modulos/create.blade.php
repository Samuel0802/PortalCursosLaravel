<div>

    <h2>Cadastrar os Modulos</h2>

    <x-alert-error/>

    <form action="{{ route('modulos.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Modulo" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
