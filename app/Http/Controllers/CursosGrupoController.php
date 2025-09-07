<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosGruposRequest;
use App\Models\Cursos;
use App\Models\CursosGrupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CursosGrupoController extends Controller
{
    //Listar Turmas de Cursos
    public function index(Cursos $curso)
    {

        //Listar Grupos de Cursos
        $grupos = CursosGrupo::orderBy('id', 'desc')
            //condição que filtrar apenas os grupos que pertencem ao curso específico
            ->where('curso_id', $curso->id)
            ->paginate(6);

        //Salvando Log Listando Cursos Modulos
        Log::info('Listando Cursos Grupo');

        return view('curso_grupos.index', ['grupos' => $grupos, 'curso' => $curso]);
    }

    //Detalhes Turmas de Cursos
    public function show(CursosGrupo $grupo)
    {

        return view('curso_grupos.show', ['grupo' => $grupo]);
    }

    //Carregar o formulário cadastrar nova turma
    public function create(Cursos $curso)
    {
        return view('curso_grupos.create', ['curso' => $curso]);
    }

    public function store(Cursos $curso, CursosGruposRequest $request)
    {
        try {

            //Cadastrar no banco de dados na tabela cursos grupo
            $grupo = CursosGrupo::create([
                'name' => $request->input('name'),
                //pega o ID do curso que veio pela rota,o grupo pertence a um curso específico
                'curso_id' => $curso->id,
            ]);

            //Salvando Log Cadastrando Cursos Modulos
            Log::info('Cadastrado Cursos Modulos', [
                'CursosModulos_id' => $grupo->id
            ]);


            return redirect()->route('cursos_grupo.index', ['curso' => $curso->id])
                ->with('success', 'Curso Grupo Cadastrado com Sucesso!');
        } catch (\Exception $e) {

            Log::error('Cadastrado Cursos Modulos', [
                'error' => $e->getMessage()
            ]);

            //Redireciona o usuario, caso houver erro ao cadastrar o curso grupo
            return back()->withInput()->with('error', 'Erro ao Cadastrar o Curso Grupo ');
        }
    }

    public function edit(CursosGrupo $grupo)
    {

        return view('curso_grupos.edit', ['grupo' => $grupo]);
    }

    public function update(CursosGruposRequest $request, CursosGrupo $grupo)
    {

        try {
            $grupo->update([
                'name' => $request->input('name'),
            ]);

            //Verifica se campo existe na requisição e não é nulo
            if ($request->has('name')) {
                Log::notice(
                    'Usuario alterou Cursos Grupo',
                    [
                        'grupo_id' => $grupo->id,
                    ]
                );
            }

            //Log de confirmação
            Log::info(
                'usuario alterou com Sucesso',
                [
                    'grupo' => $grupo->id,
                ]
            );

            return redirect()->route('cursos_grupo.show', ['grupo' => $grupo->id])->with('success', 'Curso Grupo Atualizado com Successo');
        } catch (\Exception $e) {

            //Log de confirmação
            Log::error(
                'Error ao alterar Cursos Grupo',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return back()->withInput()->with('error', 'Error ao Atualizar o Curso Grupo');
        }
    }

    public function destroy(CursosGrupo $grupo)
    {

        try {
            $grupo->delete();

            //Salvando log de delete
            Log::info(
                'Usuario deletou Cursos Grupo',
                [
                    'grupo' => $grupo->id
                ]
            );

            return redirect()->route('cursos_grupo.index', ['curso' => $grupo->curso_id])->with('success', 'Curso Grupo Excluido com Sucesso');
        } catch (\Exception $e) {

            //Salvar Log de Error
            Log::critical(
                'Error ao deletar Cursos Grupo',
                [
                    'error' => $e->getMessage()
                ]
            );

            return back()->withInput()->with('error', 'Error ao Excluir o Curso Grupo');
        }
    }
}
