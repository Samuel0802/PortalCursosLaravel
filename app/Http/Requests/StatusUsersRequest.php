<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusUsersRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
      // pega o usuário da rota (se existir)
        $status_users = $this->route('status');

        return [
           'name' => 'required',
           // Status do user é unico (ignora o ID do usuário atual se for edição)
           'name' => 'required|unique:status_users,name,' . ($status_users ? $status_users->id : 'NULL') . ',id',

        ];
    }

    public function messages() :array
    {
         return [
           'name.required' => 'Campo Status Users é Obrigatório',
           'name.unique' => 'Status Users já Cadastrado',
         ];
    }
}
