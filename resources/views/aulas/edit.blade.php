<div>

    <h2>Editar as Aulas</h2>

    <x-alert-error/>

    <a href="{{ route('aulas.index', ['modulo' => $aula->modulos_id]) }}">Listar</a><br>
     <a href="{{ route('aulas.show' , ['aula' => $aula->id]) }}">Visualizar</a><br><br>

    <form action="{{ route('aulas.update', ['aula' => $aula->id]) }}" method="POST">
       @csrf
       @method('PUT')

       <label>Nome:</label>
       <input type="text" name="name" id="name" placeholder="Nome do Curso" value="{{ old('name', $aula->name) }}" />

       <button type="submit">Salvar</button>

    </form>
</div>
