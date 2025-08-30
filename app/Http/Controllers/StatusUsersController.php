<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusUsersRequest;
use App\Models\StatusUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class StatusUsersController extends Controller
{
   public function index(){

     $status = StatusUsers::orderBy('id', 'desc')->paginate(1);

      Log::info('Lista de Status User');

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
       $statusUser = StatusUsers::create([
          'name' => $request->input('name'),
        ]);

       //Salvar Log de Cadastro
        Log::info('Cadastro de Status User', [
            'statusUser_id' => $statusUser->id,
            'statusNome' => $statusUser->name,
        ]);

       return redirect()->route('status_users.index')->with('success', 'Status Users Cadastrado com sucesso');

      } catch (\Exception $e) {

         //Salvar log de Error
        Log::error('Error ao apagar Status User', [
           'error' => $e->getMessage()
        ]);

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

      //verifica se o campo existe na requisição e não é nulo.
      if($request->has('name')){
        Log::notice('Usuario alterou Status Users',
        [
          'status_id' => $status->id,

        ]);
      }

    //salvar log editar
    Log::info('Status Users Atualizado', [
        'statusUsers_id' => $status->id
    ]);

    return redirect()->route('status_users.show', ['status' => $status])->with('success', 'Status Users Atualizado com Sucesso');

   } catch (\Exception $e) {

    //Salvando log
    Log::critical('Error ao deletar Status User', [
        'error' => $e->getMessage()
    ]);

    return redirect()->route('status_users.show', ['status' => $status])->with('error', 'Erro ao Atualizar o Status Users');

   }

   }

   public function destroy(StatusUsers $status){

    try {
          $status->delete();

          //Salvando Log
          Log::info('Status User deletado!', [
            'StatusUser', $status->id
          ]);

         return redirect()->route('status_users.index')->with('success', 'Status Users Excluido com Sucesso');

    } catch (\Exception $e) {

        //Salvando Log
             Log::critical('Error ao deletar Status Users', [
                'error' => $e->getMessage()
             ]);
            return redirect()->route('status_users.index')->with('error', 'Status Users Excluido com Sucesso');
    }

   }
}
