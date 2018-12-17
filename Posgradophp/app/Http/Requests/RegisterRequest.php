<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class RegisterRequest extends FormRequest
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
            'PrimerNombre' =>'required',
            'PrimerApellido' =>'required',
            'dni' =>'required',
            'email' => 'required|email|unique:users',
            'Telefono' => 'required',
            'Password' => 'required|min:6',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ];
    }

    public function messages()
    {
        return [
            'Password.required'=>'El campo contraseña es obligatorio',
            'g-recaptcha-response.required' => 'Por favor demuestra que eres un humano'
        ];
    }
}
