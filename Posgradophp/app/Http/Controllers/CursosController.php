<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Etiqueta;

class CursosController extends Controller
{
    public function index()
    {
        $data = Curso::paginate(5);
        // dd($data);
        
        //  $data = Etiqueta::all();
        // dd($data->find(4)->cursos()->get());
        //dd(json_encode($data));
        // ['data',json_encode($data)]

        return view('welcome', compact('data'));
    }

    public function search($search_value)
    {
 
        // divide la frase mediante cualquier número de comas o caracteres de espacio,
        // lo que incluye " ", \r, \t, \n y \f
        
        $data = preg_split("/[\s,]+/", $search_value);
        
        $cursos = Curso::with('etiquetas')->wherehas('etiquetas', function ($sql) use ($data) {
             $sql->WhereIn('Etiqueta', $data);
        });
      $cursos=  $cursos->paginate(2);
           //dd($cursos);
        return view("search/search",compact('cursos'),compact('search_value'));
    }
}
