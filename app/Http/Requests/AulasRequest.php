<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulasRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }

    public function messages() :array
    {
       return[
          'name.required' => 'Campo Aula é Obrigatório'
       ];
    }
}
