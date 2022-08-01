<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioStoreRequest extends FormRequest
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
            'comentario' => 'required|string',
            'informe_id' => 'required|exists:informes,id',
            'archivo' => 'nullable'];

        if ( $this->hasFile('archivo') ){
            $rules['archivo'] = ['mimes:pdf,docx,doc'];
        }

        return $rules;
    }
}
