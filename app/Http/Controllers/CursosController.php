<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosRequest;
use App\Models\Cursos;
use Illuminate\Support\Facades\Log;

class CursosController extends Controller
{

    public function index()
    {

        //recuperar os registro do banco de dados cursos
        $cursos = Cursos::orderBy('id', 'desc')->paginate(10);
        //    dd($cursos);

        //Salvar log de listagem
        Log::info('Usuario Listou os Cursos');

        return view('cursos.index', ['cursos' => $cursos]);
    }

    //Visualizar Cursos
    public function show(Cursos $cursos)
    {

        //carregar uma view
        return view('cursos.show', ['cursos' =>  $cursos]);
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
            return redirect()->route('cursos.index')->with('success', 'Curso Cadastrado com sucesso');
        } catch (\Exception $e) {

            //Log de error ao cadastrar curso
            Log::info(
                'Error Ao Cadastrou Curso',
                [
                    'error' => $e->getMessage()
                ]
            );

            //Redireciona o usuario, caso houver erro ao cadastrar o curso
            return redirect()->route('cursos.create')->with('error', 'Erro ao cadastrar o curso');
        }
    }

    //Carregar o formulário editar Cursos
    public function edit(Cursos $cursos)
    {

        return view('cursos.edit', ['cursos' => $cursos]);
    }

    //Função de update de cursos
    public function update(CursosRequest $request, Cursos $cursos)
    {

        try {

            $cursos->update([
                'name' => $request->input('name')
            ]);

            //Verifica requisição do campo se é nulo
            if ($request->has('name')) {
                Log::notice(
                    'Usuario alterou nome do Curso',
                    [
                        'cursos_id' => $cursos->id
                    ]
                );
            }

            //Salvar log de update com success
            Log::info(
                'Usuario alterou com sucesso',
                [
                    'cursos' => $cursos->id
                ]
            );

            return redirect()->route('cursos.show', ['cursos' => $cursos])->with('success', 'Curso Atualizado com Sucesso');
        } catch (\Exception $e) {

            //Salvar log de error update
            Log::info(
                'Usuario alterou com sucesso',
                [
                    'error' => $e->getMessage(),
                ]
            );

            return redirect()->route('cursos.show', ['cursos' => $cursos])->with('error', 'Erro ao Atualizar o Curso');
        }
    }

    //Excluir o curso do banco
    public function destroy(Cursos $cursos)
    {

        try {
            $cursos->delete();

            //Salvando log de delete
            Log::info(
                'Usuario deletou Cursos',
                [
                    'cursos_id' => $cursos->id,
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

            return redirect()->route('cursos.index')->with('error', 'Erro ao Excluir o Curso');
        }
    }
}
