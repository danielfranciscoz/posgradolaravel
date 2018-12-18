<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {        
        //Retorna true porque la validacion de admin la hago en el MiddleWare        
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
            'Nombre'=>'required',
            'Profesion'=>'required',
            'Desc_Pais'=>'required',
            'Comentario'=>'required|max:2000',
            'Image_URL'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'Desc_Pais.required'=>'El campo pais es obligatorio',
            'Image_URL.required'=>'El campo Foto es obligatorio'           
        ];
    }
}
