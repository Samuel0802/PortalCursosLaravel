<?php

namespace App\Http\Controllers;

use App\Models\CursosStatus;
use Illuminate\Http\Request;

class CursosStatusController extends Controller
{
    //listar status cursos
    public function index()
    {
        //recuperar os registro do banco de dados cursos status
        $statusCurso = CursosStatus::orderBy('id', 'desc')->get();
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

    public function store(Request $request)
    {

        //Criando no Status do curso
        try {
            CursosStatus::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            //Redireciona o usuário, enviar a mensagem de sucesso
            return redirect()->route('cursos_statuses.index')->with('success', 'Status do curso Cadastrado com Sucesso');
        } catch (\Exception $e) {

            //Redireciona o usuario, caso houver erro ao cadastrar o status do curso
            return redirect()->route('cursos_statuses.create')->with('error', 'Erro ao cadastrar o status do curso');
        }
    }

    public function edit(CursosStatus $cursosstatus)
    {
        return view('curso_status.edit', ['cursosstatus' => $cursosstatus]);
    }

    public function update(Request $request, CursosStatus $cursosstatus)
    {

        try {
            $cursosstatus->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('cursos_statuses.show', ['cursosstatus' => $cursosstatus])->with('success', 'Status do Curso Atualizado com Sucesso');
        } catch (\Exception $e) {
            return redirect()->route('cursos.edit', ['cursosstatus' => $cursosstatus])->with('error', 'Erro ao Atualizar o Status do Curso');
        }
    }


    public function destroy(CursosStatus $cursosstatus)
    {

        try {
            $cursosstatus->delete();

            return redirect()->route('cursos_statuses.index')->with('success', 'Status do Curso Excluido com Sucesso');
        } catch (\Exception $e) {

            return redirect()->route('cursos_statuses.index')->with('error', 'Error ao Excluir o Status do Curso');
        }
    }
}
