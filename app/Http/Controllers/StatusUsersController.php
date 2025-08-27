<?php

namespace App\Http\Controllers;

use App\Models\StatusUsers;
use Illuminate\Http\Request;

class StatusUsersController extends Controller
{
   public function index(){

     $status = StatusUsers::orderBy('id', 'desc')->get();

     return view('status_users.index', ['status' => $status]);
   }

   public function show(StatusUsers $status){
    return view('status_users.show', ['status' => $status]);
   }

   public function create(){
    return view('status_users.create');
   }

   public function store(Request $request){
      try {
        StatusUsers::create([
          'name' => $request->input('name'),
          'created_at' => now(),
          'updated_at' => now(),
        ]);

       return redirect()->route('status_users.index')->with('success', 'Status Users Cadastrado com sucesso');

      } catch (\Exception $e) {
       return redirect()->route('status_users.create')->with('error', 'Erro ao Cadastrar Status Users');
      }
   }
}
