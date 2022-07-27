<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformeStoreRequest extends FormRequest
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
            'nombre_informe' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:pdf,docx,doc'];
        }

        return $rules;
    }
}
