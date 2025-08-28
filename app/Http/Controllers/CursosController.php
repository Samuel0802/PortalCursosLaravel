<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursosRequest;
use App\Models\Cursos;


class CursosController extends Controller
{

    public function index(){

        //recuperar os registro do banco de dados cursos
       $cursos = Cursos::orderBy('id', 'desc')->get();
    //    dd($cursos);

        return view('cursos.index', ['cursos' => $cursos]);
    }

    //Visualizar Cursos
    public function show(Cursos $cursos){

      //carregar uma view
      return view('cursos.show', ['cursos' =>  $cursos]);
    }

    //Carregar o formulário cadastrar novo curso
    public function create(){
        return view('cursos.create');
    }

    public function store(CursosRequest $request){
        // dd($request);
         //Cadastrar no banco de dados na tabela cursos

      try {

         Cursos::create([
          'name' => $request->input('name'),
        ]);

        //Redireciona o usuário, enviar a mensagem de sucesso
        return redirect()->route('cursos.index')->with('success', 'Curso Cadastrado com sucesso');

      } catch (\Exception $e) {
        //Redireciona o usuario, caso houver erro ao cadastrar o curso
        return redirect()->route('cursos.create')->with('error', 'Erro ao cadastrar o curso');
      }
    }

    //Carregar o formulário editar Cursos
    public function edit(Cursos $cursos){

     return view('cursos.edit', ['cursos' => $cursos]);

    }

    //Função de update de cursos
    public function update(CursosRequest $request, Cursos $cursos){

       try {

       $cursos->update([
         'name' => $request->input('name')
       ]);

       return redirect()->route('cursos.show', ['cursos' => $cursos])->with('success', 'Curso Atualizado com Sucesso');

       } catch (\Exception $e) {

        return redirect()->route('cursos.show', ['cursos' => $cursos])->with('error', 'Erro ao Atualizar o Curso');
       }

    }

    //Excluir o curso do banco
    public function destroy(Cursos $cursos){

        try {
           $cursos->delete();

         return redirect()->route('cursos.index')->with('success', 'Curso Excluido com Sucesso');

        } catch (\Exception $e) {

              return redirect()->route('cursos.index')->with('error', 'Erro ao Excluir o Curso');
        }
    }
}
