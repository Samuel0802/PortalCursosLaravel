<?php

namespace App\Http\Controllers;

use App\Http\Requests\AulasRequest;
use App\Models\Aulas;
use App\Models\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AulasController extends Controller
{
    public function index(Modulos $modulo)
    {
        //Listar todas as aulas
        $aulas = Aulas::orderBy('id', 'desc')
         //condição que filtrar apenas as aulas que pertencem ao modulo específico
        ->where('modulos_id', $modulo->id)
        ->paginate(10);


        Log::info('Usuario listou as Aulas');

        return view('aulas.index', ['aulas' =>  $aulas]);
    }

    //Visualizar aulas
    public function show(Aulas $aulas)
    {

        return view('aulas.show', ['aula' => $aulas]);
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(AulasRequest $request)
    {

        try {
            $aula = Aulas::create([
                'name' => $request->input('name'),

            ]);

            Log::info(
                'Usuario cadastrou uma Aula',
                [
                    'aula_id' => $aula->id,
                ]
            );

            //successo ?
            return redirect()->route('aulas.index')->with('success', 'Aula Cadastrada com Sucesso!');
        } catch (\Exception $e) {

            Log::info(
                'Error ao cadastrar uma Aula',
                [
                    'aula_id' => $e->getMessage(),
                ]
            );

            //erro!
            return redirect()->route('aulas.create')->with('error', 'Erro ao Cadastrar a Aula');
        }
    }

    public function edit(Aulas $aulas)
    {

        return view('aulas.edit', ['aulas' => $aulas]);
    }

    public function update(AulasRequest $request, Aulas $aulas)
    {
        try {
            $aulas->update([
                'name' => $request->input('name')
            ]);

            //verifica se o campo existe na requisição e não é nulo.
            if ($request->has('name')) {
                Log::notice(
                    "Usuario alterou Aula",
                    [
                        'aulas' => $aulas->id,
                    ]
                );
            }

            Log::info(
                'Alterou aula com Sucesso',
                [
                    'aulas' => $aulas->id,
                ]
            );



            return redirect()->route('aulas.show', ['aulas' => $aulas])->with('success', 'Aula Atualizada com Sucesso');
        } catch (\Exception $e) {

               Log::info(
                'Error ao alterar aula',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return redirect()->route('aulas.show', ['aulas' => $aulas])->with('error', 'Error ao Atualizar a Aula');
        }
    }

    public function destroy(Aulas $aulas)
    {

        try {
            $aulas->delete();

                 Log::info(
                'Usuario deletou aula',
                [
                    'aula' => $aulas->id,
                ]
            );

            return redirect()->route('aulas.index')->with('success', 'Aula Excluida com Sucesso');
        } catch (\Exception $e) {

                 Log::critical(
                'Error ao delatar aula',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return redirect()->route('aulas.index')->with('success', 'Aula Excluida com Sucesso');
        }
    }
}
