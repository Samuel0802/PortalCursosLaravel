<?php

namespace App\Http\Controllers;

use App\Models\CursosGrupo;
use Illuminate\Http\Request;

class CursosGrupoController extends Controller
{
    public function index(){
      return view('cursosgrupo.index');
    }

    public function create(){
      return view('cursosgrupo.create');
    }

    public function store(Request $request){
    //   dd($request);

     try {

         //Cadastrar no banco de dados na tabela cursos grupo
     CursosGrupo::create([
        'name' => $request->input('name'),
        'created_at' => now(),
        'updated_at' => now(),
     ]);

     return redirect()->route('cursosgrupo.index')->with('success', 'Curso Grupo Cadastrado com Sucesso!');

     } catch (\Exception $e) {
     //Redireciona o usuario, caso houver erro ao cadastrar o curso grupo
     return redirect()->route('cursosgrupo.create')->with('error', 'Erro ao Cadastrar o Curso Grupo ' . $e->getMessage());
     }


    }


}
