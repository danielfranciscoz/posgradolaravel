<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'isCursoPosgrado'=>'required',
            'Categoria'=>'required',
            'Imagen'=>'sometimes|required|image|mimes:jpeg,png,jpg|max:2048|dimensions:max_width=550,max_width=720',
            'Descripcion'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'Desc_Pais.required'=>'El campo pais es obligatorio',
            // 'Imagen.required'=>'La Imagen es obligatoria'           
        ];
    }
}
