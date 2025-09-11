<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {


        //Regra da validação do formulário Users
        return [
            'name' => 'required',
            'login' => 'required|unique:users|regex:/^\S*$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'

        ];
    }

    //Feedback da validação do formulário Users
    public function messages(): array
    {
        return [
            'name.required' => 'Campo Nome é Obrigatório',
            'login.required' => 'Campo Login é Obrigatório',
            'login.unique' => 'Login já Cadastrado',
            'login.regex' => 'Login não pode conter espaços em branco',
            'email.required' => 'Campo Email é Obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Necessário um Email válido',
            'password.required' => 'Campo Senha é Obrigatório!',
            'password.confirmed' => 'A Confirmação de Senha Não corresponde!',
            'password.min' => 'Senha com Minimo :min Caracteres!',

        ];
    }
}
