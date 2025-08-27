<div>

    <h2>Editar as Aulas</h2>

    <x-alert-error/>

    <a href="{{ route('aulas.index') }}">Listar</a><br>
     <a href="{{ route('aulas.show' , ['aulas' => $aulas->id]) }}">Visualizar</a><br><br>

    <form action="{{ route('aulas.store') }}" method="post">
       @csrf
       @method('POST')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name', $aulas->name) }}" required/>

       <button type="submit">Salvar</button>

    </form>
</div>
