<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

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

    public function store(Request $request){
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
}
