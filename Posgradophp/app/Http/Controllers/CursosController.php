<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Cursoprecio;
use App\Models\Cursotematica;
use App\Models\Cursomodalidad;
use App\Models\Etiqueta;
use App\Models\Categoria;
use App\Models\Comentario;
use Session;
use Illuminate\Support\Facades\Auth;

class CursosController extends Controller
{
    public function index()
    {
      

        $data = Curso::orderBy('created_at','DESC')->take(10)->get();
        $comentarios = Comentario::all()->where('deleted_at',null);

        return view('welcome', compact('data'))
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
        
        return view("cursos.search")
        ->with('search_value',$search_value)
        ->with('cursos',$cursos);
    }

    public function categories($categoria)
    { 

        $categoria_id = Categoria::where('Categoria', $categoria)->first();
        $cursos_id = Curso::where('Categoria_Id', $categoria_id->id)->pluck('id')->toArray();
        
        $cursos = Cursoprecio::with('curso')
        ->where('deleted_at','=',null)
        ->whereIn('curso_id',$cursos_id);
             
        
        $cursos=  $cursos->paginate(3);

        // dd($cursos);

        return view("cursos.cursoscategoria")
         ->with('categoria',$categoria)
        ->with('cursos',$cursos);
    }
    public function curso($curso_name)
    { 
        $precio = Cursoprecio::with('curso')          
        ->where('deleted_at','=',null)
        ->wherehas('curso', function ($sql) use ($curso_name) {
            $sql ->where('NombreCurso','like',$curso_name);
        })->first();
        
        $curso =  $precio->curso()
            ->with('competencias')
            ->with('tematicas')
            ->with('modalidades')            
            ->with('requisitos')      
            ->with('docentes')      
            ->first();
            

        return view("cursos.curso")        
        ->with(compact('curso'))
        ->with(compact('precio'));
    }

       public function addcarrito(Request $request)
    { 
    // $request->session()->flush();

       $id= $request->input('curso');
        $curso = Cursoprecio::with('curso')->where('id',$id)->get();
        
        if(count($curso) == 0)
        {
            return response()->json([
                'error' => 'Se encuentra intentando agregar un curso que no existe',
                'message' => 'error'
                ]);
        }


            $existid = false;
            for($i=0;$i<count(Session::get('cartItems'));$i++)
            {
               if(Session::get('cartItems')[$i]['id']== $id){
                return response()->json([
                    'error' => 'Ya fue agregado al carrito',
                    'message' => 'error'
                    ]);
                        $existid = true;
                    }
                    
            }

        //  dd($curso->get(0));
           if($existid == false){
            Session::push('cartItems', [
                'id' => $curso->get(0)->id, //Tabla precioCurso
                'curso' => $curso->get(0)->Curso()->get()[0]->NombreCurso, //tabla curso
                'Image_URL'=> $curso->get(0)->Curso()->get()[0]->Image_URL,
                'Precio' => $curso->get(0)->Precio
                
                ]); 
           }

        return response()->json([
            'message' => Session::get('cartItems')]);
       
      
        
/* 
        return Input::get(); */
        
    }


    public function delcarrito(Request $request)
    {  
        $id= $request->input('curso');
        $existid = false;
        
        if(count(Session::get('cartItems'))>0){

            for($i=0;$i<count(Session::get('cartItems'));$i++){

                    if(Session::get('cartItems')[$i]['id']== $id){
                        
                        $existid == true;
                        
                        $arraysession = Session::get('cartItems');
                        Session::forget('cartItems');
                        
                        unset($arraysession[$i]); 
                        
                        foreach($arraysession as $data ){
                            Session::push('cartItems', $data);
                        }
       
                        return response()->json([
                            
                            'message' => Session::get('cartItems')
                            ]);
                    }
                }
            }  
        if($existid==false){
            return response()->json([
                'error' => 'Elemento del carrito no existe o ya fue eliminado',
                'message' => 'error'
                ]);
                    $existid = true;
                }
        }

    

    
}
