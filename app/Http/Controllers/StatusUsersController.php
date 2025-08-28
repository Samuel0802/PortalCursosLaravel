<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusUsersRequest;
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

   public function store(StatusUsersRequest $request){

      try {
        StatusUsers::create([
          'name' => $request->input('name'),
        ]);

       return redirect()->route('status_users.index')->with('success', 'Status Users Cadastrado com sucesso');

      } catch (\Exception $e) {
       return redirect()->route('status_users.create')->with('error', 'Erro ao Cadastrar Status Users');
      }
   }

       //Carregar o formulário editar Status Users
   public function edit(StatusUsers $status){
    return view('status_users.edit', ['status' => $status]);

   }

   //Realizar a função de update do Status Users
   public function update(StatusUsersRequest $request, StatusUsers $status){

   try {
      $status->update([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('status_users.show', ['status' => $status])->with('success', 'Status Users Atualizado com Sucesso');

   } catch (\Exception $e) {

    return redirect()->route('status_users.show', ['status' => $status])->with('error', 'Erro ao Atualizar o Status Users');

   }

   }

   public function destroy(StatusUsers $status){

    try {
          $status->delete();

         return redirect()->route('status_users.index')->with('success', 'Status Users Excluido com Sucesso');

    } catch (\Exception $e) {
            return redirect()->route('status_users.index')->with('error', 'Status Users Excluido com Sucesso');
    }

   }
}
