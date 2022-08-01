<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglamentoStoreRequest extends FormRequest
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
        $rules = [
            'nombre_reglamento' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:pdf'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'archivo.required' => 'Por favor elija el archivo del reglamnento.',
        ];
    }
}
