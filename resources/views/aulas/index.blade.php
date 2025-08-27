<div>
    <h2>Listar as Aulas</h2>

    <x-alert-success/>

      <a href="{{ route('aulas.create') }}">Cadastrar Aulas</a>

 <br><br><br>
      {{-- @foreach ($aulas as $aula)

       Id: {{ $aula->id }}<br>
       Nome: {{ $aula->name }}<br>
<hr>

      @endforeach --}}

      @forelse ($aulas as $aula)
         Id: {{ $aula->id }}<br>
         Nome: {{ $aula->name }}<br>

         <a href="{{ route('aulas.show' , ['aulas' => $aula->id]) }}"> Visualizar</a><br>

         <hr>

      @empty

        <p>Sem registros de Aulas</p>

      @endforelse
</div>
