<div>
    <h2>Detalhes das Aulas</h2>

    <x-alert-success />

    <a href="{{ route('aulas.index', ['modulo' => $aula->modulos_id]) }}">Listar Aulas</a><br>
    <a href="{{ route('aulas.edit', ['aula' => $aula->id]) }}">Editar Aulas</a><br>

           <form action="{{ route('aulas.destroy', ['aula' => $aula->id]) }}" method="POST">
            @csrf
            @method('delete')

            <button type="submit" onclick="return confirm('Deseja realmente excluir?')"> Excluir</button>

           </form>

    <br><br><br>
      <hr>

    Id: {{ $aula->id }}<br>
    Nome: {{ $aula->name }}<br>
    Modulos: {{ $aula->modulos?->name ?? 'Sem modulos' }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($aula->created_at)->format('d/m/Y H:m:s') }}<br>
    Atualizado: {{ \Carbon\Carbon::parse($aula->updated_at)->format('d/m/Y H:m:s') }}<br>


    <hr>


</div>
