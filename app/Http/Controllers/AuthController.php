<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterUserRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use App\Notifications\BoasVindasNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


//Controller de Login e Logout
class AuthController extends Controller
{
    //Carregar a view do login
    public function index()
    {
        return view('auth.login');
    }

    //Validar os dados do usuário ao realizar o login
    public function loginProcess(AuthLoginRequest $request)
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

    //FORMULÁRIO CADASTRAR NOVO USUARIO
    public function create()
    {
        return view('auth.register');
    }

    public function store(AuthRegisterUserRequest $request)
    {

        try {
            //Funçaõ para gerar matricula automaticamente para user

            // Pega o último ID da tabela users
            $ultimoUsuario = User::orderBy('id', 'desc')->first();
            //Se ultimoUsuario existir pega id dele soma + 1
            $numeroMatricula  = $ultimoUsuario ? $ultimoUsuario->id + 1 : 1;
            //Formatar a matricula do user,str_pad preenchendo a string com tamanho desejado e com zero a esquerda
            $matricula = str_pad($numeroMatricula, 4, '0' , STR_PAD_LEFT);

            $user = User::create([

                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'email' => $request->input('email'),
                'matricula' => $matricula,
                'password' => bcrypt($request->input('password')), //criptografa a senha
            ]);

            //Salvar Log
            Log::info('Usuário Cadastrado', ['user' => $user->id]);

            //Notificar o usuário por email
            $user->notify(new BoasVindasNotification());

            return redirect()->route('login')->with('success', 'Cadastro realizado com Sucesso');
        } catch (\Exception $e) {

            return back()->withInput()->with('error', 'Erro ao Cadastrar o Usuario' . $e->getMessage());
        }
    }
}
