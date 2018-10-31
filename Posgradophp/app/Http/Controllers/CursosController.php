<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Etiqueta;

class CursosController extends Controller
{
    public function index(){
        
         $data = Curso::all();
        // dd($data);
        
        //  $data = Etiqueta::all();
        // dd($data->find(4)->cursos()->get());
// dd(json_encode($data));
// ['data',json_encode($data)]

        return view('welcome',compact('data'));    
    }

    public function search($value){
 
        // divide la frase mediante cualquier número de comas o caracteres de espacio,
        // lo que incluye " ", \r, \t, \n y \f
        $data = preg_split ("/[\s,]+/",$value);

         dd($data);

        return view ('welcome');
    }
}
