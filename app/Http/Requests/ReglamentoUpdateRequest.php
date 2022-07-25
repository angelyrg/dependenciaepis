<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglamentoUpdateRequest extends FormRequest
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
            'archivo' => 'nullable'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:pdf,docx,doc'];
        }

        return $rules;
    }
}
