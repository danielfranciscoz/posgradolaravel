<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocentesRequest extends FormRequest
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
            'Nombres' =>'required',
            'Profesion' =>'required',
            'Descripcion' =>'required',
            'Imagen'=>'sometimes|required|image|mimes:jpeg,png,jpg|max:2048|dimensions:height=250,width=250'           
        ];
    }

    public function messages()
    {
        return [
            'Nombres.required'=>'El Nombres pais es obligatorio (Asegúrese de escribir almenos un nombre y un apellido)',          
        ];
    }
}
