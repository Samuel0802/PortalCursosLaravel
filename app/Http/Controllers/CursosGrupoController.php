<?php

namespace App\Http\Controllers;

use App\Models\CursosGrupo;
use Illuminate\Http\Request;

class CursosGrupoController extends Controller
{
    public function index()
    {

        //Listar Grupos de Cursos
        $grupos = CursosGrupo::orderBy('id', 'desc')->get();

        return view('curso_grupos.index', ['grupos' => $grupos]);
    }

    public function create()
    {
        return view('curso_grupos.create');
    }

    public function show(CursosGrupo $grupo)
    {

        return view('curso_grupos.show', ['grupo' => $grupo]);
    }

    public function store(Request $request)
    {

        try {

            //Cadastrar no banco de dados na tabela cursos grupo
            CursosGrupo::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('cursos_grupo.index')->with('success', 'Curso Grupo Cadastrado com Sucesso!');
        } catch (\Exception $e) {
            //Redireciona o usuario, caso houver erro ao cadastrar o curso grupo
            return redirect()->route('cursos_grupo.create')->with('error', 'Erro ao Cadastrar o Curso Grupo ' . $e->getMessage());
        }
    }

    public function edit(CursosGrupo $grupo)
    {

        return view('curso_grupos.edit', ['grupo' => $grupo]);
    }

    public function update(Request $request, CursosGrupo $grupo)
    {

        try {
            $grupo->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('cursos_grupo.show', ['grupo' => $grupo])->with('success', 'Curso Grupo Atualizado com Successo');
        } catch (\Exception $e) {

            return redirect()->route('cursos_grupo.show', ['grupo' => $grupo])->with('error', 'Error ao Atualizar o Curso Grupo');
        }
    }

    public function destroy(CursosGrupo $grupo)
    {

        try {
            $grupo->delete();

            return redirect()->route('cursos_grupo.index')->with('success', 'Curso Grupo Excluido com Sucesso');

        } catch (\Exception $e) {
            return redirect()->route('cursos_grupo.index')->with('error', 'Error ao Excluir o Curso Grupo');
        }
    }
}
