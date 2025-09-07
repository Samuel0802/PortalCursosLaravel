<div>

    <h2>Cadastrar as Aulas</h2>

    <x-alert-error/>

    <form action="{{ route('aulas.store', ['modulo' => $modulo->id]) }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{  old('name') }}"/>

       <button type="submit">Cadastrar</button>

    </form>
</div>
