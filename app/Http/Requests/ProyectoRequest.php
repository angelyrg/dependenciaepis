<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoRequest extends FormRequest
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
            'nombre_grupo' => 'required',
            'modalidad_grupo' => 'required',
            'nombre_proyecto' => 'required',
            'descripcion' => 'required',
            'modalidad_id' => 'required|exists:modalidads,id',
            'asesor_id' => 'required|exists:asesors,id',
            'coasesor_id' => 'exists:asesors,id|different:asesor_id',
        ];
    }

    public function messages(){
        return [
            'coasesor_id.different' => 'El asesor y co asesor deben ser diferentes.',
        ];
    }
}
