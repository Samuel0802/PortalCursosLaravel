<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use Illuminate\Http\Request;

class ModulosController extends Controller
{
    public function index()
    {

        //listar os modulos cadastrados no banco de dados
        $modulos = Modulos::orderBy('id', 'desc')->get();

        return view('modulos.index', ['modulos' => $modulos]);
    }

    public function show(Modulos $modulo)
    {
        return view('modulos.show', ['modulo' => $modulo]);
    }

    public function create()
    {
        return view('modulos.create');
    }

    public function store(Request $request)
    {

        try {
            Modulos::create([
                'name' => $request->input('name'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->route('modulos.index')->with('success', 'Modulo Cadastado com Sucesso');
        } catch (\Exception $e) {

            return redirect()->route('modulos.create')->with('error', 'Erro ao Cadastrar Modulos');
        }
    }

    public function edit(Modulos $modulo)
    {

        return view('modulos.edit', ['modulo' => $modulo]);
    }

    public function update(Request $request, Modulos $modulo)
    {

        try {
            $modulo->update([
                'name' => $request->input('name'),
            ]);

            return redirect()->route('modulos.show', ['modulo' => $modulo])->with('success', 'Modulo Atualizado com Sucesso');

        } catch (\Exception $e) {

            return redirect()->route('modulos.show', ['modulo' => $modulo])->with('error', 'Error ao Atualizar o Modulo');
        }
    }
}
