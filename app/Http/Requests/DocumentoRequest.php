<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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
        $rules = [
            'nombre_documento' => 'required|string',
            'archivo' => 'required',
            'proyecto_id' => 'required|exists:proyectos,id'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:pdf'];
        }

        return $rules;
    }
}
