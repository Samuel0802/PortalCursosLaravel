<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Return_;

//Controller de Perfil do usuário
class ProfileController extends Controller
{
    public function show()
    {

        //recuperando o usuario logado no sistema
        $user = User::where('id', Auth::id())->first();

        //    dd($user);

        //Salvar Log
        Log::info('User Visualizou o Perfil', ['user_id' => $user->id, 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->name]);

        return view('profile.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        //Salvar Log
        Log::info('User Editar o Perfil', ['user' => $user->id, 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->name]);

        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {

          $regra = [
            'name' => 'required',
            'email' => 'required|email',
        ];

         $feedback = [
            'name.required' => "Campo nome é obrigatório!",
            'email.required' => "Campo email é obrigatório!",
             'email.email' => "Campo email deve ser um email válido!",
         ];

         $request->validate($regra, $feedback);

        try {

            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);


            //Salvar log
            Log::info('User Atualizou o Perfil Com Sucesso', ['user' => $user->id, 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->login]);

            return redirect()->route('profile.show', ['user' => $user->id])->with('success', 'Perfil Atualizado com Sucesso');
        } catch (\Exception $e) {

            //Salvar log
            Log::error('Error ao Atualizar o Perfil', ['error' => $e->getMessage(), 'action_user' => Auth::id(), 'action_user_name' => Auth::user()->login]);
            return back()->withInput()->with('error', 'Erro ao Atualizar o Perfil');
        }
    }

    public function editPassword(User $user)
    {

        //Salvando Log
        Log::info('User Editar a Senha', ['user' => $user->id, 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->login]);

        return view('profile.edit_password', ['user' => $user]);
    }

    public function updatePassword(Request $request, User $user)
    {

        $regra = [
            'password' => 'required|confirmed|min:6',
        ];

        $feedback = [
            'password.required' => "Campo senha é obrigatório!",
            'password.min' => "Senha com no mínimo :min caracteres!",
            'password.confirmed' => 'A Confirmação de Senha Não corresponde!',
        ];

        $request->validate($regra, $feedback);

        try {
            $user->update([
               'password' => Hash::make($request->password),
            ]);

             //Salvar Log
            Log::notice("Users Alterou a Senha", ['user_id' => $user->id, 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->login]);

        } catch (\Exception $e) {

            //Salvando log
            Log::error('Error ao Atualizar a Senha', ['error' => $e->getMessage(), 'action_user_id' => Auth::id(), 'action_user_name' => Auth::user()->login ]);

            return back()->withInput()->with('error', 'Erro ao Atualizar a Senha');
        }


    }
}
