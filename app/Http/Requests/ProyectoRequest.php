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
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'modalidad_id' => 'required|exists:modalidads,id',
            'asesor_id' => 'required|exists:asesors,id',
            'coasesor_id' => 'nullable|exists:asesors,id|different:asesor_id',
        ];
    }

    public function messages(){
        return [
            'coasesor_id.different' => 'El asesor y co asesor deben ser diferentes.',
            'fecha_fin.after_or_equal' => 'La fecha de finalización debe ser una fecha posterior o igual a fecha inicio.'
        ];
    }
}
