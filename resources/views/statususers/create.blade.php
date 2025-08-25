<div>

    <h2>Cadastrar Status Users</h2>

    <x-alert-error/>

    <form action="{{ route('statususers.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Status Users" required/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
