<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

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

        //  dd($request);
        //Capturar possíveis exceções durante a execução
        try {
            //Validar o login e a senha com as informações do banco de dados
            $authenticado = Auth::attempt([
                'login' => $request->login,
                'password' => $request->password,
            ]);

            //Verificar se o usuario foi autenticado
            //se for false
            if (!$authenticado) {
                Log::notice('Dados do login incorreto!', ['login' => $request->login]);

                return back()->withInput()->with('error', 'Login ou Senha incorretos');
            }

            //Salvar Log
            Log::info('Login', ['action_user_id' => Auth::id()]);

            return redirect()->route('dashboard.index')->with('success', 'Login realizado com sucesso!');


        } catch (\Exception $e) {

            Log::notice('Senha do usuario não editado', ['error' => $e->getMessage()]);

            return back()->withInput()->with('error', 'Login ou Senha incorretos');
        }
    }

    //deslogar o usuário
    public function logout(Request $request)
    {
        //salvar log
        Log::notice('User deslogou', ['action_user_id' => Auth::id()]);

        //deslogar o usuário
        Auth::logout();

       // Encerra completamente a sessão atual do usuário
        $request->session()->invalidate();
        // //Gera um novo token CSRF para a sessão
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
    }
}
