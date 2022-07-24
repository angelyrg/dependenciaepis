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
            'nombres'   => 'required|array',
            'apellidos'   => 'required|array',
            'codigo'   => 'required|array',
            'email' => 'required|array',
            'proyecto_id' => 'required|array',

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
