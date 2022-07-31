<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EjecutorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombres'   => 'required|string',
            'apellidos'   => 'required|string',
            'codigo_matricula'   => 'required|string|unique:ejecutors',
            'ciclo' => 'nullable|string',
            'proyecto_id' => 'required|exists:proyectos,id',
            'cargo_id' => 'required|exists:cargos,id',
        ];
    }

    public function messages()
    {
        return [
            'proyecto_id.required' => "El proyecto no existe",
        ];
    }

}
