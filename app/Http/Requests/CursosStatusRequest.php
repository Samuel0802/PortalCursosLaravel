<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosStatusRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $status_cursos = $this->route('cursosstatus');

        return [
            // Status do curso é unico (ignora o ID do usuário atual se for edição)
            'name' => 'required|unique:cursos_statuses,name,' . ($status_cursos ? $status_cursos->id : 'NULL') . ',id',


        ];
    }

    public function messages() :array
    {
    return [
        'name.required' => 'Campo Status Cursos é Obrigatório',
        'name.unique' => 'Status Cursos já Cadastrado'
    ];

    }
}
