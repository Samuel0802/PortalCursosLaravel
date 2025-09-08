<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

//Controller de Users Administrativo
class UserController extends Controller
{
    public function index()
    {

        //Listar os usuarios
        $users = User::orderBy('id', 'desc')->paginate(10);

        //Salvar LOG
        Log::info('Listar os Usuário.');

        return view('users.index', ['users' => $users]);
    }

    //Visualizar detalhe do user
    public function show(User $user)
    {

        //Salvar log
        Log::info('Visualizar o usuário', ['user_id' => $user->id]);

        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {

        try {

            $user = User::create([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'email' => $request->input('email'),
                'matricula' => $request->input('matricula'),
                'password' => $request->input('password'),
            ]);

            //Salvar Log
            Log::info('Usuário Cadastrado', ['user_id' => $user->id]);

            return redirect()->route('users.show', ['user' => $user])->with('success', 'Usuario Cadastrado com sucesso');
        } catch (\Exception $e) {

            //Salvar Log
            Log::notice('Usuário não Cadastrado', ['error' => $e->getMessage()]);

            return redirect()->route('users.create')->with('error', 'Erro ao cadastrar o usuario' . $e->getMessage());
        }
    }

    //Carregar o formulário editar Users
    public function edit(User $user)
    {

        return view('users.edit', ['user' => $user]);
    }


    //função de editar o Users
    public function update(UserRequest $request, User $user)
    {

        try {

            $user->update([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'email' => $request->input('email'),

            ]);

            //Salvar Log
            Log::info('Usuário Editado', ['user_id' => $user->id]);

            return redirect()->route('users.show', ['user' => $user])->with('success', 'Usuario Atualizado Com Sucesso');
        } catch (\Exception $e) {

            //Salvar Log do error
            Log::notice('Error editar', ['error' => $e->getMessage()]);


            return redirect()->route('users.show', ['user' => $user])->with('error', 'Erro ao Atualizar o Usuario');
        }
    }


    //Carregar o formulário editar Password Users
    public function editPassword(User $user)
    {

        return view('users.edit_password', ['user' => $user]);
    }


    // Editar no banco de dados a senha do usuário
    public function updatePassword(Request $request, User $user)
    {
        // Validar o formulário
        $request->validate(
            [
                'password' => 'required|confirmed|min:6',
            ],
            [
                'password.required' => "Campo senha é obrigatório!",
                'password.min' => "Senha com no mínimo :min caracteres!",
                'password.confirmed' => 'A Confirmação de Senha Não corresponde!',
            ]
        );

        // Capturar possíveis exceções durante a execução.
        try {
            // Editar as informações do registro no banco de dados
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            //verifica se o campo existe na requisição e não é nulo.
            if ($request->has('password')) {
                Log::notice('Usuario alterou a senha', [
                    'user_id' => $user->id
                ]);
            }

            // Salvar log
            Log::info('Senha do usuário editado.', ['user_id' => $user->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Senha do usuário editado com sucesso!');
        } catch (\Exception $e) {

            // Salvar log
            Log::notice('Senha do usuário não editado.', ['error' => $e->getMessage()]);

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Senha do usuário não editado!');
        }
    }



    public function destroy(User $user)
    {

        try {
            $user->delete();

            //Salvar log
            Log::info('Usuário apagado', ['user_id' => $user->id]);

            return redirect()->route('users.index')->with('success', 'Usuario Excluido com Sucesso');
        } catch (\Exception $e) {

            //Salvar log
            Log::critical('Error ao apagar usuário ', ['error' => $e->getMessage()]);

            return redirect()->route('users.index')->with('error', ' Error ao Excluido Usuario');
        }
    }
}
