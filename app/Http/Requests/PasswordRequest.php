<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules(){
        return [
            'currentpassword' => 'required|string',
            'newpassword' => 'required|string',
            'renewpassword' => 'required|same:newpassword',
        ];
    }

    public function messages()
    {
        return [
            'renewpassword.same' => "Los campos nueva contraseña y confirmar nueva contraseña deben ser iguales"
        ];
    }
}
