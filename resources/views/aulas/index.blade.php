<div>
    <h2>Listar as Aulas</h2>

    <x-alert-success/>

      <a href="{{ route('aulas.create') }}">Cadastrar Aulas</a>

 <br><br><br>

      @forelse ($aulas as $aula)
         Id: {{ $aula->id }}<br>
         Nome: {{ $aula->name }}<br>

         <a href="{{ route('aulas.show' , ['aulas' => $aula->id]) }}"> Visualizar</a><br>
          <a href="{{ route('aulas.edit' , ['aulas' => $aula->id]) }}"> Editar</a><br>

           <form action="{{ route('aulas.destroy', ['aulas' => $aula->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente excluir?')"> Excluir</button>

           </form>

         <hr>

      @empty

        <p>Sem registros de Aulas</p>

      @endforelse
</div>
