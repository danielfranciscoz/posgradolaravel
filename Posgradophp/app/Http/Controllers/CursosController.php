<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\Cursoprecio;
use App\Models\Cursotematica;
use App\Models\Cursomodalidad;
use App\Models\CompetenciaCurso;
use App\Models\Etiqueta;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Docente;
use Session;
use Illuminate\Support\Facades\Auth;

class CursosController extends Controller
{
    public function index()
    {   
        $categoriaselect = Categoria::where('deleted_at',null)->get();
        $docentesselect = Docente::where('deleted_at',null)->get();
        return view('cms.cursos') 
            ->with(compact('categoriaselect'))
            ->with(compact('docentesselect'));
    }
  
    public function categories($categoria,$orden=null)
    { 

        $sort=['created_at','DESC'];
        
        if($orden != null){
            switch ($orden) {
                case 'precio_asc':
                $sort=['Precio','ASC']; 
                    break;

                case 'precio_desc':
                $sort=['Precio','DESC']; 
                    break;
                
                default:
                // $sort=['created_at','DESC'];
                    break;
            }  
        }
        $categoria_id = Categoria::where('Categoria', $categoria)->first();
        
        if($categoria_id==null){
            return response()->json([
                'message'=>'La categoría no existe'
            ]);
        }
      //  dd($categoria_id);
        $cursos_id = Curso::where('Categoria_Id', $categoria_id->id)->pluck('id')->toArray(); //Pluck retorna solo la columna que se menciona
        
        $cursos = Cursoprecio::where('deleted_at','=',null)
        ->whereIn('curso_id',$cursos_id)
        ->orderBy($sort[0],$sort[1]);
             
       
        $cursos=  $cursos->paginate(5);

        // dd($cursos);

        return view("cursos.cursoscategoria")
         ->with('categoria',$categoria_id)
        ->with('cursos',$cursos);
    }

    public function search($search_value,$orden=null)
    { 

        $sort=['created_at','DESC'];
        if($orden != null){
            switch ($orden) {
                case 'precio_asc':
                $sort=['Precio','ASC']; 
                break;
                
                case 'precio_desc':
                $sort=['Precio','DESC']; 
                break;
                
                default:
                // $sort=['created_at','DESC'];
                break;
            }  
        }
       
        // divide la frase mediante cualquier número de comas o caracteres de espacio,
        // lo que incluye " ", \r, \t, \n y \f
        $data = preg_split("/[\s,]+/", $search_value);   
        $etiquetas = collect();
        $curso_name = collect();

        for ($i=0; $i < Count($data); $i++) { 
            $e =Etiqueta::where('Etiqueta','Like','%'.$data[$i].'%')->get();
            $etiquetas = $etiquetas->merge($e);   
        }

        for ($i=0; $i < Count($data); $i++) { 
            $e =Curso::where('NombreCurso','Like','%'.$data[$i].'%')->get();
            $curso_name = $curso_name->merge($e);   
        }
       
        $cursos = Curso::with('etiquetas')->wherehas('etiquetas', function ($sql) use ($etiquetas) {
            $sql->WhereIn('etiqueta_id', $etiquetas->pluck('id'));
        })
        ->orWhereIn('id',$curso_name->pluck('id'))
        ->pluck('id')->toArray();
       
        if (Count($etiquetas)==0 && Count($cursos)>0) {
            
            $etiquetas=Etiqueta::with('cursos')->wherehas('cursos', function ($sql) use ($curso_name) {
                $sql->WhereIn('curso_id', $curso_name->pluck('id'));
            })->get();           
        }

        $c = Cursoprecio::with('curso')
            ->where('deleted_at','=',null)
            ->whereIn('curso_id',$cursos)
            ->orderBy($sort[0],$sort[1]);
        
        $c = $c->paginate(5);
        
        return view("cursos.search")
        ->with('search_value',$search_value)
        ->with('cursos',$c)
        ->with(compact('etiquetas'));
    }
   
    public function maestrias($orden=null)
    { 
        $sort=['created_at','DESC'];
        
        if($orden != null){
            switch ($orden) {
                case 'precio_asc':
                $sort=['Precio','ASC']; 
                    break;

                case 'precio_desc':
                $sort=['Precio','DESC']; 
                    break;
                
                default:
                // $sort=['created_at','DESC'];
                    break;
            }  
        }
              
        $cursos_id = Curso::where('Categoria_Id', null)->pluck('id')->toArray(); //Pluck retorna solo la columna que se menciona
        
        $cursos = Cursoprecio::where('deleted_at','=',null)
        ->whereIn('curso_id',$cursos_id)
        ->orderBy($sort[0],$sort[1]);
             
       
        $cursos=  $cursos->paginate(5);

        return view("cursos.maestria")
         ->with('cursos',$cursos);
    }

    public function curso($curso_name)
    { 
        $precio = Cursoprecio::where('deleted_at','=',null)
        ->wherehas('curso', function ($sql) use ($curso_name) {
            $sql ->where('NombreCurso','like',$curso_name);
        })->firstorfail();
        
        $curso =  $precio->curso()   
            ->first();         

        return view("cursos.curso")        
            ->with(compact('curso'))
            ->with(compact('precio'));
    }

    public function searchcursos(Request $request){

        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        //$v = Cursoprecio::with('curso')->where('deleted_at',null);

        $v = Curso::leftJoin('cursoprecios', 'cursos.id', '=', 'cursoprecios.curso_id')
        ->leftJoin('categorias', 'categorias.id', '=', 'cursos.categoria_id')       
        ->select('cursoprecios.id','cursoprecios.Precio', 'cursos.NombreCurso', 'cursos.categoria_id', 'cursos.Image_URL', 'cursos.Temario_URL', 'cursos.Desc_Publicidad','cursos.Desc_Introduccion','cursos.InfoAdicional','Categorias.Categoria' )
        ->where('cursoprecios.deleted_at',null);

        // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
        
        if (strlen($searchv) !=0) {
            $v = $v          
            ->Where('cursos.NombreCurso','LIKE','%'.$searchv.'%');
        }else{
            $v = $v->getQuery();
        }
        
        if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0)
        {          
            $v = $v->orderBy($sortColumn,$sortColumnDir);
        }
        
        $totalRecords = Count($v->get());
        $data = $v->Skip($skip)->Take($pagesize)->get();
        
        return response()->Json([
                'draw' => $draw, 
                'recordsFiltered' => $totalRecords, 
                'recordsTotal' => $totalRecords, 
                'data' => $data ]);
    }

    public function searchRelacionesCurso($idcurso){
        $id = Cursoprecio::find($idcurso);
        $curso = Curso::
            with('competencias')
            ->with('tematicas')
            ->with('modalidades')
            ->with('requisitos')
            ->with('docentes')
            ->with('etiquetas')
            ->find($id->curso_id);

        dd($curso);

        return response()->json([
            'curso'=> $curso
        ]);
    }

    public function store(CursoRequest $request){

    }
    public function update(CursoRequest $request,$id){

    }
  
    public function destroy($id){
        $original = Cursoprecio::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'El curso no ha sido encontrado en la base de datos'
            ]);
        }
        try {
            $original->deleted_at =date('Y-m-d H:i:s');            
            $original->save();

            return response()->json([
                'message'=>'exito'
            ]);
            
        } catch (Exception $e) {
            return report($e);
        }
    }
}
