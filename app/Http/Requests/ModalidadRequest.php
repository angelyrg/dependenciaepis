<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModalidadRequest extends FormRequest
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
            'nombre' => 'required',
            'estado' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo mombre de la modalidad es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
        ];
    }
}
