<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidRecaptcha;

class PaymentRequest extends FormRequest
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
            // 'payment_method' =>'required',
            'bill_to_forename' =>'required',
            'bill_to_surname' =>'required',
            'bill_to_email' =>'required',
            'bill_to_phone' =>'required',
            'bill_to_address_linel' =>'required',
            'bill_to_address_city' =>'required',
            'bill_to_address_state' =>'required',
            'bill_to_address_country' =>'required',
            'bill_to_address_postal_code' => 'required|email|unique:users',
            'amount' => 'required',
            // 'currency' => 'required|min:6',
            'g-recaptcha-response' => ['required', new ValidRecaptcha]
        ];
    }

    public function messages()
    {
        return [
            'bill_to_forename.required'=>'Ingrese el nombre de la persona',
            'bill_to_surname.required'=>'Ingrese el apellido de la persona',
            'bill_to_email.required'=>'Ingrese un correo válido',
            'bill_to_phone.required'=>'Ingrese un número telefónico',
            'bill_to_address_linel.required'=>'Ingrese la dirección de facuración',
            'bill_to_address_city.required'=>'Ingrese la ciudad de facturación',
            'bill_to_address_country.required'=>'Ingrese el estado',
            'bill_to_address_postal_code.required'=>'Ingrese el código postal',
            'amount.required'=>'No se ha especificado la cantidad a cobrar',
            'g-recaptcha-response.required' => 'Por favor demuestra que eres un humano'
        ];
    }
}
