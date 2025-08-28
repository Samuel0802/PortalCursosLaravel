<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulosRequest extends FormRequest
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
    return [
        'name.required' => 'Campo Modulo é Obrigatório'
    ];
    }
}
