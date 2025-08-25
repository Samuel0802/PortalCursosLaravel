<?php

namespace App\Http\Controllers;

use App\Models\CursosStatus;
use Illuminate\Http\Request;

class CursosStatusController extends Controller
{
    //listar status cursos
    public function index()
    {
        return view('cursosstatus.index');
    }

    //cadastrar status cursos
    public function create()
    {
        return view('cursosstatus.create');
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
            return redirect()->route('cursosstatus.index')->with('success', 'Status do curso Cadastrado com Sucesso');
        } catch (\Exception $e) {

            //Redireciona o usuario, caso houver erro ao cadastrar o status do curso
            return redirect()->route('cursosstatus.create')->with('error', 'Erro ao cadastrar o status do curso');
        }
    }
}
