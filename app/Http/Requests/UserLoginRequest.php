<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'   => 'required|digits:6',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '*Obligatorio',
            //'email.email' => 'Formato incorrecto',
            'email.digits' => 'El campo debe ser un número de 6 dígitos.',


            'password.required' => '*Obligatorio',
            'password.min' => '6 caracteres como minimo',
        ];
    }
}
