<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosRequest;
use App\Models\Cursos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CursosController extends Controller
{

    public function index()
    {

        //recuperar os registro do banco de dados cursos
        $cursos = Cursos::orderBy('id', 'desc')->paginate(10);
        //    dd($cursos);

        //Salvar log de listagem
        Log::info('Usuario Listou os Cursos',  ['action_user_id' => Auth::id()]);

        return view('cursos.index', ['cursos' => $cursos]);
    }

    //Visualizar Cursos
    public function show(Cursos $curso)
    {

        //Salvar log de visualização
        Log::info('Usuario visualizou detalhes do curso',  ['action_user_id' => Auth::id()]);

        //carregar uma view
        return view('cursos.show', ['curso' =>  $curso]);
    }

    //Carregar o formulário cadastrar novo curso
    public function create()
    {
        return view('cursos.create');
    }

    public function store(CursosRequest $request)
    {
        // dd($request);
        //Cadastrar no banco de dados na tabela cursos

        try {

            $curso = Cursos::create([
                'name' => $request->input('name'),
            ]);

            //Salvando Log de Cursos
            Log::info(
                'Usuario Cadastrou Curso',
                [
                    'curso_id' => $curso->id
                ]
            );

            //Redireciona o usuário, enviar a mensagem de sucesso
            return redirect()->route('cursos.show' , ['curso' => $curso->id])->with('success', 'Curso Cadastrado com sucesso');
        } catch (\Exception $e) {

            //Log de error ao cadastrar curso
            Log::info(
                'Error Ao Cadastrou Curso',
                [
                    'error' => $e->getMessage()
                ]
            );

            //Redireciona o usuario, caso houver erro ao cadastrar o curso

            return back()->withInput()->with('error', 'Erro ao cadastrar o curso');
        }
    }

    //Carregar o formulário editar Cursos
    public function edit(Cursos $curso)
    {

        return view('cursos.edit', ['curso' => $curso]);
    }

    //Função de update de cursos
    public function update(CursosRequest $request, Cursos $curso)
    {

        try {

            $curso->update([
                'name' => $request->input('name')
            ]);

            //Verifica requisição do campo se é nulo
            if ($request->has('name')) {
                Log::notice(
                    'Usuario alterou nome do Curso',
                    [
                        'cursos_id' => $curso->id
                    ]
                );
            }

            //Salvar log de update com success
            Log::info(
                'Usuario alterou com sucesso',
                [
                    'curso' => $curso->id
                ]
            );

            return redirect()->route('cursos.show', ['curso' => $curso])->with('success', 'Curso Atualizado com Sucesso');
        } catch (\Exception $e) {

            //Salvar log de error update
            Log::info(
                'Usuario alterou com sucesso',
                [
                    'error' => $e->getMessage(),
                ]
            );

         return back()->withInput()->with('error', 'Erro ao Atualizar o Curso');
        }
    }

    //Excluir o curso do banco
    public function destroy(Cursos $curso)
    {

        try {
            $curso->delete();

            //Salvando log de delete
            Log::info(
                'Usuario deletou Cursos',
                [
                    'cursos_id' => $curso->id,
                ]
            );

            return redirect()->route('cursos.index')->with('success', 'Curso Excluido com Sucesso');
        } catch (\Exception $e) {

             //Salvando log de error delete
            Log::critical(
                'Error ao deletar Cursos',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return back()->withInput()->with('error', 'Error ao Excluir o Curso');
        }
    }
}
