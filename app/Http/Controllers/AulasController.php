<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    public function index()
    {
        return view('aulas.index');
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {

        try {
            Aulas::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

          //successo ?
          return redirect()->route('aulas.index')->with('success', 'Aula Cadastrada com Sucesso!');

        } catch (\Exception $e) {
           //erro!
           return redirect()->route('aulas.create')->with('error', 'Erro ao Cadastrar a Aula');

        }
    }
}
