<div>
    <h2>Listar as Aulas</h2>

    <x-alert-success />

    <a href="{{ route('aulas.index') }}">Listar Aulas</a><br>
    <a href="{{ route('aulas.edit', ['aulas' => $aula->id]) }}">Editar Aulas</a>

    <br><br><br>


    Id: {{ $aula->id }}<br>
    Nome: {{ $aula->name }}<br>
    Modulos: {{ $aula->modulos?->name ?? 'Sem modulos' }}<br>
    Cadastrado: {{ \Carbon\Carbon::parse($aula->created_at)->format('d/m/Y H:m:s') }}<br>
    Atualizado: {{ \Carbon\Carbon::parse($aula->updated_at)->format('d/m/Y H:m:s') }}<br>


    <hr>


</div>
