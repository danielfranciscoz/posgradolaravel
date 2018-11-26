<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Etiqueta;
use App\Models\Categoria;
use App\Models\Comentario;
use Session;

class CursosController extends Controller
{
    public function index()
    {
        $data = Curso::orderBy('created_at','DESC')->take(10)->get();
        $categorias = Categoria::all()->where('deleted_at',null);
        $comentarios = Comentario::all()->where('deleted_at',null);

        //dd($data->first()->categoria()->get());
        
        //  $data = Etiqueta::all();
        // dd($data->find(4)->cursos()->get());
        //dd(json_encode($data));
        // ['data',json_encode($data)]

        return view('welcome', compact('data'))
        ->with(compact('categorias'))
        ->with(compact('comentarios'));
    }

    public function search($search_value)
    { 
        // divide la frase mediante cualquier número de comas o caracteres de espacio,
        // lo que incluye " ", \r, \t, \n y \f
        $data = preg_split("/[\s,]+/", $search_value);      
        $cursos = Curso::with('etiquetas')->wherehas('etiquetas', function ($sql) use ($data) {
            $sql->WhereIn('Etiqueta', $data);
        });
        $cursos=  $cursos->paginate(5);
        //dd($cursos);
        $categorias = Categoria::all();
        
        return view("cursos.search",compact('categorias'))
        ->with('search_value',$search_value)
        ->with('cursos',$cursos);
    }

    public function categories($categoria)
    { 

        $cursos = Curso::with('categoria')->wherehas('categoria', function ($sql) use ($categoria) {
             $sql->Where('Categoria', $categoria);
        });
        
        $categorias = Categoria::all()->where('deleted_at',null);
        $cursos=  $cursos->paginate(10);
        //    dd($cursos);
        return view("cursos.cursoscategoria",compact('categorias'))
        ->with('categoria',$categoria)
        ->with('cursos',$cursos);
    }
    public function curso($curso)
    { 
        $categorias = Categoria::all()->where('deleted_at',null);
        return view("cursos.curso",compact('categorias'))
        
        ->with('curso',$curso);
    }
       public function addcarrito(Request $curso)
    { 
        /* if (Request::has('cartItems')) { */
            Session::push('cartItems', [
                'id' => $curso,
               'curso' => 'Curso laravel',    
                 'cantidad' => 1 ]);
             
      
        /* } */
       
        return response()->json([
            'message' => 'sucess',
            ]);
        
        
    }
}
