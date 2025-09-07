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

        return view('aulas.index', ['aulas' =>  $aulas, 'modulo' => $modulo]);
    }

    //Visualizar aulas
    public function show(Aulas $aula)
    {

        return view('aulas.show', ['aula' => $aula]);
    }

    public function create(Modulos $modulo)
    {
        return view('aulas.create', ['modulo' => $modulo]);
    }

    public function store(AulasRequest $request, Modulos $modulo)
    {

        try {
            $aula = Aulas::create([
                'name' => $request->input('name'),
                'modulos_id' => $modulo->id,

            ]);

            Log::info(
                'Usuario cadastrou uma Aula',
                [
                    'aula_id' => $aula->id,
                ]
            );

            //successo ?
            return redirect()->route('aulas.index', ['modulo' => $modulo->id])->with('success', 'Aula Cadastrada com Sucesso!');

        } catch (\Exception $e) {

            Log::info(
                'Error ao cadastrar uma Aula',
                [
                    'aula_id' => $e->getMessage(),
                ]
            );

            //erro!
          return back()->withInput()->with('error', 'Erro ao Cadastrar a Aula');
        }
    }

    public function edit(Aulas $aula)
    {

        return view('aulas.edit', ['aula' => $aula]);
    }

    public function update(AulasRequest $request, Aulas $aula)
    {
        try {
            $aula->update([
                'name' => $request->input('name')
            ]);

            //verifica se o campo existe na requisição e não é nulo.
            if ($request->has('name')) {
                Log::notice(
                    "Usuario alterou Aula",
                    [
                        'aula' => $aula->id,
                    ]
                );
            }

            Log::info(
                'Alterou aula com Sucesso',
                [
                    'aulas' => $aula->id,
                ]
            );



            return redirect()->route('aulas.show', ['aula' => $aula])->with('success', 'Aula Atualizada com Sucesso');

        } catch (\Exception $e) {

               Log::info(
                'Error ao alterar aula',
                [
                    'error' => $e->getMessage(),
                ]
            );

          return back()->withInput()->with('error', 'Error ao Atualizar a Aula');
        }
    }

    public function destroy(Aulas $aula)
    {

        try {
            $aula->delete();

                 Log::info(
                'Usuario deletou aula',
                [
                    'aula' => $aula->id,
                ]
            );

            return redirect()->route('aulas.index', )->with('success', 'Aula Excluida com Sucesso');
        } catch (\Exception $e) {

                 Log::critical(
                'Error ao delatar aula',
                [
                    'error' => $e->getMessage(),
                ]
            );

          //error
          return back()->withInput()->with('error', 'Aula Excluida com Sucesso');
        }
    }
}
