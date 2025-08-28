<?php

namespace App\Http\Controllers;

use App\Models\Aulas;
use Illuminate\Http\Request;

class AulasController extends Controller
{
    public function index()
    {
        //Listar todas as aulas
        $aulas = Aulas::orderBy('id', 'desc')->get();

        return view('aulas.index', ['aulas' =>  $aulas]);
    }

    //Visualizar aulas
    public function show(Aulas $aulas)
    {

        return view('aulas.show', ['aula' => $aulas]);
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

    public function edit(Aulas $aulas)
    {

        return view('aulas.edit', ['aulas' => $aulas]);
    }

    public function update(Request $request, Aulas $aulas)
    {
        try {
            $aulas->update([
                'name' => $request->input('name')
            ]);

            return redirect()->route('aulas.show', ['aulas' => $aulas])->with('success', 'Aula Atualizada com Sucesso');
        } catch (\Exception $e) {

            return redirect()->route('aulas.show', ['aulas' => $aulas])->with('error', 'Error ao Atualizar a Aula');
        }
    }

    public function destroy(Aulas $aulas)
    {

        try {
            $aulas->delete();

            return redirect()->route('aulas.index')->with('success', 'Aula Excluida com Sucesso');
        } catch (\Exception $e) {
            return redirect()->route('aulas.index')->with('success', 'Aula Excluida com Sucesso');
        }
    }
}
