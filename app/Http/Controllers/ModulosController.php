<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulosRequest;
use App\Models\Modulos;
use App\Models\CursosGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModulosController extends Controller
{
    public function index(CursosGrupo $cursoGrupo)
    {

        //listar os modulos cadastrados no banco de dados
        $modulos = Modulos::orderBy('id', 'desc')->paginate(10);

        Log::info('Listando Modulos');

        return view('modulos.index', ['modulos' => $modulos, 'grupo' => $cursoGrupo]);
    }

    public function show(Modulos $modulo)
    {
        // força carregar a turma junto do model Modulos.php
       $modulo->load('cursosGrupo');

        //Salvar Log de Detalhes de modulos
        Log::info('Visualizou o modulo do id', [
            'modulo' => $modulo->id
        ]);

        return view('modulos.show', ['modulo' => $modulo]);
    }

    public function create()
    {
        return view('modulos.create');
    }

    public function store(ModulosRequest $request)
    {

        try {
           $modulo = Modulos::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            //  Salvar log de criação de modulos
             Log::info('Criado modulo Success', [
                'modulo_id' => $modulo->id,
             ] );


            return redirect()->route('modulos.index')->with('success', 'Modulo Cadastado com Sucesso');
        } catch (\Exception $e) {

            //  Salvar log de error criação de modulos
            Log::error('Error ao criar modulo', [
                'modulo_id' => $e->getMessage(),
             ] );

            return redirect()->route('modulos.create')->with('error', 'Erro ao Cadastrar Modulos');
        }
    }

    public function edit(Modulos $modulo)
    {

        return view('modulos.edit', ['modulo' => $modulo]);
    }

    public function update(ModulosRequest $request, Modulos $modulo)
    {

        try {
            $modulo->update([
                'name' => $request->input('name'),
            ]);

              //verifica se o campo existe na requisição e não é nulo.
            if($request->has('name')){
                Log::notice('Usuario alterou o Modulo', [
                    'modulo_id' => $modulo->id,
                ]);
            }

             //Salvar log de update de modulos
             Log::info('Update Modulo Success', [
                'modulo_id' => $modulo->id,
             ] );

            return redirect()->route('modulos.show', ['modulo' => $modulo])->with('success', 'Modulo Atualizado com Sucesso');

        } catch (\Exception $e) {

               //  Salvar log de update de modulos
             Log::error('Error ao realizar update modulo ', [
                'modulo_id' => $e->getMessage(),
             ] );

            return redirect()->route('modulos.show', ['modulo' => $modulo])->with('error', 'Error ao Atualizar o Modulo');
        }
    }

    public function destroy(Modulos $modulo){
         try {
            $modulo->delete();

               //  Salvar log de update de modulos
             Log::info('Delete modulo Success', [
                'modulo_id' => $modulo->id,
             ] );

            return redirect()->route('modulos.index')->with('success', 'Modulo Excluido com Sucesso');

         } catch (\Exception $e) {

               //  Salvar log de update de modulos
             Log::critical('Error Delete Modulo ', [
                'modulo_id' => $e->getMessage(),
             ] );

            return redirect()->route('modulos.index')->with('error', 'Error ao Excluir o Modulo');
         }

    }
}
