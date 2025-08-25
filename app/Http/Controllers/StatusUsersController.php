<?php

namespace App\Http\Controllers;

use App\Models\StatusUsers;
use Illuminate\Http\Request;

class StatusUsersController extends Controller
{
   public function index(){
     return view('statususers.index');
   }

   public function create(){
    return view('statususers.create');
   }

   public function store(Request $request){
      try {
        StatusUsers::create([
          'name' => $request->input('name'),
          'created_at' => now(),
          'updated_at' => now(),
        ]);

       return redirect()->route('statususers.index')->with('success', 'Status Users Cadastrado com sucesso');

      } catch (\Exception $e) {
       return redirect()->route('statususers.create')->with('error', 'Erro ao Cadastrar Status Users');
      }
   }
}
