<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //Carregar a view do login
    public function index()
    {
        return view('auth.login');
    }

    //Validar os daods do usuário do login
    public function loginProcess(LoginRequest $request)
    {

        // dd($request);
        //Capturar possíveis exceções durante a execução
        try {
               //Validar o login e a senha com as informações do banco de dados
             $authenticado = Auth::attempt([
                   'login' => $request->login,
                   'password' => $request->password,
               ]);

               //Verificar se o usuario foi autenticado
               //se for false
               if(!$authenticado){
                  Log::notice('Dados do login incorreto!', ['login' => $request->login]);

                return back()->withInput()->with('error', 'Login ou Senha incorretos');
               }

               return redirect()->route('dashboard.index')->with('success', 'Login realizado com sucesso!');

        } catch (\Exception $e) {

            Log::notice('Senha do usuario não editado', ['error' => $e->getMessage()]);

            return back()->withInput()->with('error', 'Login ou Senha incorretos');
        }





    }
}
