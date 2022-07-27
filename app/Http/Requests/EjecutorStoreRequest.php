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
            'nombres'   => 'required|array|min:1',
            'apellidos'   => 'required|array|min:1',
            'codigo_matricula'   => 'required|array|min:1',
            'ciclo' => 'required|array|min:1',
            'proyecto_id' => 'required|array|min:1',

            'nombres.*' => 'required|string',
            'apellidos.*' => 'required|string',
            'codigo_matricula.*' => 'required|digits:10',
            'ciclo.*' => 'required',
            'proyecto_id.*' => 'required|exists:proyectos,id',
        ];
    }

    public function messages()
    {
        return [
            'proyecto_id.required' => "",
        ];
    }

}
