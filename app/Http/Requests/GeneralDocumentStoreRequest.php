<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralDocumentStoreRequest extends FormRequest
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
            'nombre_documento' => 'required|string',
            'descripcion' => 'required|string',
            'archivo' => 'required'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:ppt,pptx,doc,docx,pdf,xls,xlsx'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'archivo.required' => 'Debe cargar un documento.',
        ];
    }
}
