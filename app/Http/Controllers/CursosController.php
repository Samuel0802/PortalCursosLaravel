<?php

namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{

    public function index(){
        return view('cursos.index');
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
