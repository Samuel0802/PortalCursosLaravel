<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;


//Controller para recuperação de senha e envio de email
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

    //Carregar o formulário para redefinir a senha e validação do token
    public function showRequestForm(Request $request)
    {

        try {

            //Recuperar dos dados do usuário no banco de dados atraves do email
            $user = User::where('email', $request->email)->first();

            //Verificar se encontrou o usuário no BD e o TOKEN é valido. FALSE
            if (!$user || !Password::tokenExists($user, $request->token)) {

                Log::error('Token invalido ou expirado', ['email' => $request->email ? $request->email : 'null']);

                return redirect()->route('login')->with('error', 'Token Inválido ou Expirado!');
            }

            //Caso for True Carregar a View
            return view('auth.reset_password', ['token' => $request->token, 'email' => $request->email]);
        } catch (\Exception $e) {

            Log::error('Token invalido ou expirado', ['error' => $e->getMessage(), 'action_user_email' => $request->email]);

            return redirect()->route('login')->with('error', 'Token Inválido ou Expirado!');
        }
    }

    //Função para redefinir a senha do usuário
    public function resetPassword(Request $request)
    {

        //Validar o formulário
        $regra = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ];

        $feedback = [
            'email.required' => "Campo email é obrigatório!",
            'email.email' => "Campo email deve ser um email válido!",
            'email.exists' => 'Email não cadastrado!',
            'password.required' => "Campo senha é obrigatório!",
            'password.min' => "Senha com no mínimo :min caracteres!",
            'password.confirmed' => 'A Confirmação de Senha Não corresponde!',
        ];

        $request->validate($regra, $feedback);

        try {
            //reset - redefinir a senha do usuario
$status = Password::reset(
              //only: Recuperar apenas os campos especificos do pedido
              $request->only('email', 'password', 'password_confirmation' ,'token'),

              //retornar o callback se a redefinição for bem sucedida
             function(User $user, string $password){
               //forceFill - forçar o acesso a atributos protegidos
              $user->forceFill([
               'password' => $password
              ]);

              //Salvando as alterações no banco de dados
              $user->save();
             });

      // Salvar log
            Log::info('Senha atualizada com Sucesso.', ['status' => $status, 'action_user_email' => $request->email]);

            // Redirecionar o usuário, enviar a mensagem de sucesso ou error
          return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('success', 'Senha Atualizada com Sucesso') : back()->withInput()->with('error', 'Senha não Atualizada!');

        } catch (\Exception $e) {

            //Salvar log de erro
            Log::error('Error ao redefinir a senha', ['error' => $e->getMessage(), 'action_user_email' => $request->email]);

            return redirect()->route('login')->with('error', 'Tente mais tarde!');
        }
    }
}
