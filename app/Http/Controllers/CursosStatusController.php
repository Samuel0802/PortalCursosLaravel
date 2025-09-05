<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosStatusRequest;
use App\Models\CursosStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CursosStatusController extends Controller
{
    //listar status cursos
    public function index()
    {
        //recuperar os registro do banco de dados cursos status
        $statusCurso = CursosStatus::orderBy('id', 'desc')->paginate(1);

        Log::info('Listando Cursos Status');

        return view('curso_status.index', ['statusCurso' => $statusCurso]);
    }

    //Visualizar status cursos
    public function show(CursosStatus $cursosstatus)
    {

        return view('curso_status.show', ['cursosstatus' =>  $cursosstatus]);
    }

    //cadastrar status cursos
    public function create()
    {
        return view('curso_status.create');
    }

    public function store(CursosStatusRequest $request)
    {

        //Criando no Status do curso
        try {
            $cursoStatus =  CursosStatus::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Cadastrado Curso Status', [
                'CursoStatus' => $cursoStatus->id
            ]);

            //Redireciona o usuário, enviar a mensagem de sucesso
            return redirect()->route('cursos_statuses.index')->with('success', 'Status do curso Cadastrado com Sucesso');
        } catch (\Exception $e) {


            Log::error('Error ao Cadastrado Curso Status', [
                'CursoStatus' => $e->getMessage()
            ]);

            //Redireciona o usuario, caso houver erro ao cadastrar o status do curso
            return back()->withInput()->with('error', 'Erro ao cadastrar o status do curso');
        }
    }

    public function edit(CursosStatus $cursosstatus)
    {
        return view('curso_status.edit', ['cursosstatus' => $cursosstatus]);
    }

    public function update(CursosStatusRequest  $request, CursosStatus $cursosstatus)
    {

        try {
            $cursosstatus->update([
                'name' => $request->input('name'),
            ]);

            //verifica se o campo existe na requisição e não é nulo.
            if ($request->has('name')) {
                Log::notice(
                    'Usuario alterando Cursos Status',
                    [
                        'cursosStatus_id' => $cursosstatus->id,

                    ]
                );
            }

            //Salvar log Update
            Log::info(
                'Update Cursos Status Realizado',
                [
                    'CursosStatus_id' => $cursosstatus->id
                ]
            );

            return redirect()->route('cursos_statuses.show', ['cursosstatus' => $cursosstatus])->with('success', 'Status do Curso Atualizado com Sucesso');
        } catch (\Exception $e) {

            //Error Salvar log Update
            Log::error(
                'Update Cursos Status Realizado',
                [
                    'CursosStatus_id' => $e->getMessage()
                ]
            );

            return back()->withInput()->with('error', 'Erro ao Atualizar o Status do Curso');
        }
    }


    public function destroy(CursosStatus $cursosstatus)
    {

        try {
            $cursosstatus->delete();

            //Salvar log Delete
            Log::info(
                'Delete Cursos Status Realizado',
                [
                    'CursosStatus_id' => $cursosstatus->id
                ]
            );

            return redirect()->route('cursos_statuses.index')->with('success', 'Status do Curso Excluido com Sucesso');
        } catch (\Exception $e) {

            //Salvar log Delete
            Log::critical(
                'Error ao deletar Cursos Status',
                [
                    'error' => $e->getMessage()
                ]
            );

            return back()->withInput()->with('error', 'Error ao Excluir o Status do Curso Pois está sendo Utilizado');
        }
    }
}
