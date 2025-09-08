<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
             'login' => 'required',
            // senha: só obrigatória se vier no request, e precisa de pelo menos 6 caracteres
            'password' => 'required',
        ];
    }

    public function messages():array
    {
      return [
        'login.required' => 'Campo Login é Obrigatório!',
        'password.required' => 'Campo Senha é Obrigatório!'
      ];
    }
}
