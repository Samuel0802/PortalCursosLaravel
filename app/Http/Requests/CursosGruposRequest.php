<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosGruposRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $curso_grupos = $this->route('grupo');

        return [
            'name' => 'required',
            'name' => 'unique:cursos_grupos,name,' . ($curso_grupos ? $curso_grupos->id : 'NULL') . ',id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo Curso Grupo é Obrigatório',
             'name.unique' => 'Curso Grupo já Cadastrado',

        ];
    }
}
