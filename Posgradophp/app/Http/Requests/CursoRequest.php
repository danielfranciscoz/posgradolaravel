<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'categoria_id'=>'required',
            'NombreCurso'=>'required',
            'Imagen'=>'sometimes|required|image|mimes:jpeg,png,jpg|max:2048|dimensions:height=270,width=480',
            'Temario'=>'sometimes|required',
            'Desc_Publicidad'=>'required',
            'Desc_Introduccion'=>'required',
            'InfoAdicional'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'categoria_id.required'=>'No se ha especificado la categoria del curso (o si es maestría)',
            'NombreCurso.required'=>'El campo Nombre del curso es obligatorio',
            'Temario.required'=>'El temario es obligatorio',
            'Desc_Publicidad.required'=>'La descripción publicitaria es obligatoria',
            'Desc_Introduccion.required'=>'La descipción de introducción es obligatoria',
            'InfoAdicional.required'=>'El campo Información adicional es obligatorio',
            
            // 'Image_URL.required'=>'La Imagen es obligatoria'           
        ];
    }
}
