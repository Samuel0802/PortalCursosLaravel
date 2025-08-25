<?php

namespace App\Http\Controllers;

use App\Models\Modulos;
use Illuminate\Http\Request;

class ModulosController extends Controller
{
    public function index(){
       return view('modulos.index');
    }

    public function create(){
    return view('modulos.create');
    }

    public function store(Request $request){

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
}
