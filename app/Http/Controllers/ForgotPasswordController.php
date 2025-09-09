<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    //Pagina de recuperação de senha
    public function showLinkRequestForm()
    {
        return view('auth.forgot_password');
    }

    //Enviar link de recuperação de senha para o email
    public function sendResetLinkEmail(Request $request)
    {

        //Validar o formulário
        $regra = [
            'email' => 'required|email',
        ];

        $feedback = [
            'email.required' => "Campo email é obrigatório!",
            'email.email' => "Campo email deve ser um email válido!",
        ];

        $request->validate($regra, $feedback);

            //Verificar se o email existe no banco de dados e retornar o ultimo registro
            $user = User::where('email', $request->email)->first();

            //Verifica se encontrou o usuário
            if (!$user) {
                Log::notice('Tentativa de recuperação de senha com email não cadastrado', ['email' => $request->email]);

                return back()->withInput()->with('error', 'Email não encontrado');
            }

             try {
               //Salvar o token recuperar senha e enviar e-mail
            $status = Password::sendResetLink(
               //Retornar um array associativo contendo apenas o campo "email" da requisição
               $request->only('email')
              );

              Log::notice('Recuperar senha ', ['status' => $status, 'email' => $request->email],);

              return redirect()->route('login')->with('success', 'Enviando e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!');


        } catch (\Exception $e) {

            Log::error('Recuperação de senha falhou', ['error' => $e->getMessage(), 'action_user_email' => $request->email]);

            return back()->withInput()->with('error', 'Tente mais tarde!');
        }
    }

    //Carregar o formulário para redefinir a senha
    public function showRequestForm(Request $request)
    {

    }


}
