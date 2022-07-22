<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres'   => 'required|array|size:1',
            'apellidos'   => 'required|array|size:1',
            'codigo'   => 'required|array|size:1',
            'email' => 'required|array|size:1',
            'proyecto_id' => 'required|array|size:1',

            'nombres.*' => 'required|string',
            'apellidos.*' => 'required|string',
            'codigo_matricula.*' => 'required|digits:10',
            'email.*' => 'required|email',
            'proyecto_id.*' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'proyecto_id.required' => "",
        ];
    }
}
