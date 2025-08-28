<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // pega o usuário da rota (se existir)
        $user = $this->route('user');

        //Regra da validação do formulário Users
        return [
            'name' => 'required',
            // login obrigatório e único (ignora o ID do usuário atual se for edição)
            'login' => 'required|unique:users,login,' . ($user ? $user->id : null),
            // email obrigatório e único (mesmo esquema acima)
            'email' => 'required|email|unique:users,email,' . ($user ? $user->id : null),
            'matricula' => 'required_if:matricula,!=null|numeric_if:matricula,!=null|unique:users,matricula',
            // senha: só obrigatória se vier no request, e precisa de pelo menos 6 caracteres
            'password' => 'required_if:password,!=null|min:6'

        ];
    }

    //Feedback da validação do formulário Users
    public function messages(): array
    {
        return [
            'name.required' => 'Campo Nome é Obrigatório',
            'login.required' => 'Campo Login é Obrigatório',
            'login.unique' => 'Login já Cadastrado',
            'email.required' => 'Campo Email é Obrigatório',
            'email.unique' => 'Email já cadastrado',
            'email.email' => 'Necessário um Email válido',
            'matricula.required' => 'Campo Matricula é Obrigátorio',
            'matricula.numeric' => 'Necessário Matricula númerica',
            'matricula.unique' => 'Matricula já Cadastrado!',
            'password.required' => 'Campo Senha é Obrigatório!',
            'password.min' => 'Senha com Minimo :min Caracteres!'

        ];
    }
}
