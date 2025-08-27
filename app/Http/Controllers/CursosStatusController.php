<?php

namespace App\Http\Controllers;

use App\Models\CursosGrupo;
use App\Models\CursosStatus;
use Illuminate\Http\Request;

class CursosStatusController extends Controller
{
    //listar status cursos
    public function index()
    {
        //recuperar os registro do banco de dados cursos status
        $statusCurso = CursosGrupo::orderBy('id', 'desc')->get();
        return view('curso_status.index', ['statusCurso' => $statusCurso]);
    }

    //Visualizar status cursos
    public function show(CursosStatus $cursosstatus){

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
}
