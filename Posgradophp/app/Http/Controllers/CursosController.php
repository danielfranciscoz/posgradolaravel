<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use App\Models\Cursoprecio;
use App\Models\Cursotematica;
use App\Models\Cursomodalidad;
use App\Models\CompetenciaCurso;
use App\Models\Cursorequisito;
use App\Models\Etiqueta;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Docente;
use Session;
use Illuminate\Support\Facades\DB;
use App\Clases\uploadPhoto;

use Illuminate\Support\Facades\Auth;

class CursosController extends Controller
{
    public function index()
    {
        $categoriaselect = Categoria::select(DB::raw("CONCAT(CASE WHEN (isCursoPosgrado=0) THEN 'Curso: ' ELSE 'Posgrado: ' END,Categoria) AS Categoria,id"))->where('deleted_at', null)->orderby('isCursoPosgrado')->get();
        
        $etiquetasselect = Etiqueta::where('deleted_at', null)->get();
        $docentesselect = Docente::where('deleted_at', null)->get();
        return view('cms.cursos')
            ->with(compact('categoriaselect'))
            ->with(compact('docentesselect'))
            ->with(compact('etiquetasselect'));
    }
  
    public function categories($categoria, $orden=null,Request $request)
    {

        $p=$request->input('p');
        $s=$request->input('s');
        $v=$request->input('v');
        
        $p = $p==null?true:$p=='1'?true:false;
        $s = $s==null?true:$s=='1'?true:false;
        $v = $v==null?true:$v=='1'?true:false;

        $sort=['created_at','DESC'];
        
        if ($orden != null) {
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
        
        if ($categoria_id==null) {
            return response()->json([
                'message'=>'La categoría no existe'
            ]);
        }

        $cursos = Curso::where('Categoria_Id', $categoria_id->id);

        $cursosPresenciales=collect();
        $cursosSemi=collect();
        $cursosVirtuales=collect();

        if ($p) {
            $cursosPresenciales = $cursos->where('isPresencial', true)->get();
        }
        if ($s) {
            $cursosSemi = $cursos->where('isSemiPresencial', true)->get();
        }
        if ($v) {
            $cursosVirtuales = $cursos->where('isVirtual', true)->get();
        }

        //  dd($categoria_id);
        $cursos_id = $cursosPresenciales->merge($cursosSemi)->merge($cursosVirtuales)->pluck('id')->toArray(); //Pluck retorna solo la columna que se menciona
        


        $cursos = Cursoprecio::where('deleted_at', '=', null)
        ->whereIn('curso_id', $cursos_id)
        ->orderBy($sort[0], $sort[1]);
        
        $cursos=  $cursos->paginate(5);

        $etiquetas=Etiqueta::with('cursos')->wherehas('cursos', function ($sql) use ($cursos_id) {
            $sql->WhereIn('curso_id', $cursos_id);
        })->get();

        //dd($etiquetas);

        return view("cursos.cursoscategoria")
         ->with('categoria', $categoria_id)
        ->with('cursos', $cursos)
        ->with(compact('etiquetas'));
    }

    public function search($search_value, $orden=null, Request $request)
    {
        $p=$request->input('p');
        $s=$request->input('s');
        $v=$request->input('v');
        
        $p = $p==null?true:$p=='1'?true:false;
        $s = $s==null?true:$s=='1'?true:false;
        $v = $v==null?true:$v=='1'?true:false;
        
        $sort=['created_at','DESC'];
        if ($orden != null) {
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
            $e =Etiqueta::where('Etiqueta', 'Like', '%'.$data[$i].'%')->get();
            $etiquetas = $etiquetas->merge($e);
        }

        for ($i=0; $i < Count($data); $i++) {
            $e =Curso::where('NombreCurso', 'Like', '%'.$data[$i].'%')->get();
            $curso_name = $curso_name->merge($e);
        }
       
        $cursos = Curso::with('etiquetas')->wherehas('etiquetas', function ($sql) use ($etiquetas) {
            $sql->WhereIn('etiqueta_id', $etiquetas->pluck('id'));
        })->orWhereIn('id', $curso_name->pluck('id'));

        $cursosPresenciales=collect();
        $cursosSemi=collect();
        $cursosVirtuales=collect();

        if ($p) {
            $cursosPresenciales = $cursos->where('isPresencial', true)->get();
        }
        if ($s) {
            $cursosSemi = $cursos->where('isSemiPresencial', true)->get();
        }
        if ($v) {
            $cursosVirtuales = $cursos->where('isVirtual', true)->get();
        }

        
        $cursos = $cursosPresenciales->merge($cursosSemi)->merge($cursosVirtuales)->pluck('id')->toArray();
      
        // if (Count($etiquetas)==0 && Count($cursos)>0) {
        $etiquetas=Etiqueta::with('cursos')->wherehas('cursos', function ($sql) use ($cursos) {
            $sql->WhereIn('curso_id', $cursos);
        })->get();
        // }

        $c = Cursoprecio::with('curso')
            ->where('deleted_at', '=', null)
            ->whereIn('curso_id', $cursos)
            ->orderBy($sort[0], $sort[1]);
        
        $c = $c->paginate(5);
        // dd($c);
        return view("cursos.search")
        ->with('search_value', $search_value)
        ->with('cursos', $c)
        ->with(compact('etiquetas'));
    }
   
    public function maestrias($orden=null,Request $request)
    {
        $p=$request->input('p');
        $s=$request->input('s');
        $v=$request->input('v');
        
        $p = $p==null?true:$p=='1'?true:false;
        $s = $s==null?true:$s=='1'?true:false;
        $v = $v==null?true:$v=='1'?true:false;

        $sort=['created_at','DESC'];
        
        if ($orden != null) {
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
              
        $cursos = Curso::where('Categoria_Id', null);
        
        $cursosPresenciales=collect();
        $cursosSemi=collect();
        $cursosVirtuales=collect();

        if ($p) {
            $cursosPresenciales = $cursos->where('isPresencial', true)->get();
        }
        if ($s) {
            $cursosSemi = $cursos->where('isSemiPresencial', true)->get();
        }
        if ($v) {
            $cursosVirtuales = $cursos->where('isVirtual', true)->get();
        }

        $cursos_id = $cursosPresenciales->merge($cursosSemi)->merge($cursosVirtuales)->pluck('id')->toArray(); //Pluck retorna solo la columna que se menciona
     
        $cursos = Cursoprecio::where('deleted_at', '=', null)
        ->whereIn('curso_id', $cursos_id)
        ->orderBy($sort[0], $sort[1]);
        
        $cursos=  $cursos->paginate(5);

        $etiquetas=Etiqueta::with('cursos')->wherehas('cursos', function ($sql) use ($cursos_id) {
            $sql->WhereIn('curso_id', $cursos_id);
        })->get();

        return view("cursos.maestria")
         ->with('cursos', $cursos)
         ->with(compact('etiquetas'));
        ;
    }

    public function curso($curso_name)
    {
        $precio = Cursoprecio::where('deleted_at', '=', null)
            ->wherehas('curso', function ($sql) use ($curso_name) {
                $sql ->where('NombreCurso', 'like', $curso_name);
            })->firstorfail();
            
        $curso =  $precio->curso()
            ->first();
            
        return view("cursos.curso")
            ->with(compact('curso'))
            ->with(compact('precio'));
    }

    public function notfound()
    {
        //Este metodo es creado debido a que se necesita la ruta limpia del controlador para hacer el ruteo desde otras partes de la aplicacion
        //cuando algun usuario intente acceder a esta url se enviara el error
        abort(404, 'El contenido de este sitio no se encuentra disponible.');
    }

    public function searchcursos(Request $request)
    {
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
        ->select('cursoprecios.id', 'cursoprecios.Precio', 'cursos.NombreCurso', 'cursos.categoria_id', 'cursos.Image_URL', 'cursos.Temario_URL', 'cursos.Desc_Publicidad', 'cursos.Desc_Introduccion', 'cursos.InfoAdicional', 'Categorias.Categoria', 'cursos.isPresencial', 'cursos.isVirtual', 'cursos.isSemiPresencial')
        ->where('cursoprecios.deleted_at', null);

        // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
        
        if (strlen($searchv) !=0) {
            $v = $v
            ->Where('cursos.NombreCurso', 'LIKE', '%'.$searchv.'%');
        } else {
            $v = $v->getQuery();
        }
        
        if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
            $v = $v->orderBy($sortColumn, $sortColumnDir);
        }
        
        $totalRecords = Count($v->get());
        $data = $v->Skip($skip)->Take($pagesize)->get();
        
        return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
    }

    public function searchcursosrequisitos(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        if ($request->has('id')) {
            $id = $request->input("id");
            //$v = Cursoprecio::with('curso')->where('deleted_at',null);
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = Cursorequisito::where('deleted_at', null)->where('curso_id', $idcurso);
            
            // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
            
            if (strlen($searchv) !=0) {
                $v = $v
                ->Where('cursos.NombreCurso', 'LIKE', '%'.$searchv.'%');
            } else {
                $v = $v->getQuery();
            }
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
            
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
            
            return response()->Json([
                    'draw' => $draw,
                    'recordsFiltered' => $totalRecords,
                    'recordsTotal' => $totalRecords,
                    'data' => $data ]);
        } else {
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => 0,
                'recordsTotal' => 0,
                'data' => '']);
        }
    }

    public function searchcursosmodalidades(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        if ($request->has('id')) {
            $id = $request->input("id");
            $searchv = $request->input("search.value");
            $pagesize = $lenght != null ? $lenght : 0;
            $skip = $start != null ? $start : 0;
            
            $totalRecords = 0;
            
            //$v = Cursoprecio::with('curso')->where('deleted_at',null);
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = Cursomodalidad::where('deleted_at', null)->where('curso_id', $idcurso);
            
            // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
            
            if (strlen($searchv) !=0) {
                $v = $v
                ->Where('cursos.NombreCurso', 'LIKE', '%'.$searchv.'%');
            } else {
                $v = $v->getQuery();
            }
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
            
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
            
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
        } else {
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => 0,
                'recordsTotal' => 0,
                'data' => '']);
        }
    }

    public function searchcursoscompetencias(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
                
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        if ($request->has('id')) {
            $id = $request->input("id");
            $searchv = $request->input("search.value");
            $pagesize = $lenght != null ? $lenght : 0;
            $skip = $start != null ? $start : 0;
            
            $totalRecords = 0;
            
            //$v = Cursoprecio::with('curso')->where('deleted_at',null);
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = CompetenciaCurso::where('deleted_at', null)->where('curso_id', $idcurso);
            
            // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
            
            if (strlen($searchv) !=0) {
                $v = $v
                ->Where('cursos.NombreCurso', 'LIKE', '%'.$searchv.'%');
            } else {
                $v = $v->getQuery();
            }
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
            
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
            
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
        } else {
            return response()->Json([
        'draw' => $draw,
        'recordsFiltered' => 0,
        'recordsTotal' => 0,
        'data' => '']);
        }
    }
            
    public function searchcursostematicas(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        if ($request->has('id')) {
            $id = $request->input("id");
            $searchv = $request->input("search.value");
            $pagesize = $lenght != null ? $lenght : 0;
            $skip = $start != null ? $start : 0;
            
            $totalRecords = 0;
            
            //$v = Cursoprecio::with('curso')->where('deleted_at',null);
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = Cursotematica::where('deleted_at', null)->where('curso_id', $idcurso);
            
            // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
            
            if (strlen($searchv) !=0) {
                $v = $v
                ->Where('cursos.NombreCurso', 'LIKE', '%'.$searchv.'%');
            } else {
                $v = $v->getQuery();
            }
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
            
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
            
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
        } else {
            return response()->Json([
        'draw' => $draw,
        'recordsFiltered' => 0,
        'recordsTotal' => 0,
        'data' => '']);
        }
    }
            
    public function searchcursosetiquetas(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        if ($request->has('id')) {
            $id = $request->input("id");
            $searchv = $request->input("search.value");
            $pagesize = $lenght != null ? $lenght : 0;
            $skip = $start != null ? $start : 0;
            
            $totalRecords = 0;
            
            // $v = Etiqueta::rightJoin('curso_etiqueta', 'curso_etiqueta.etiqueta_id', '=', 'etiquetas.id')->
            // select('curso_etiqueta.id','curso_etiqueta.etiqueta_id','curso_etiqueta.deleted_at','etiqueta')->
            // where('curso_etiqueta.deleted_at',null)->where('curso_id',$idcurso);
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = Etiqueta::where('deleted_at', null)
            ->wherehas('cursos', function ($sql) use ($idcurso) {
                $sql->where('curso_id', $idcurso);
            });
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
            
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
            
            return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
        } else {
            return response()->Json([
        'draw' => $draw,
        'recordsFiltered' => 0,
        'recordsTotal' => 0,
        'data' => '']);
        }
    }
            
    public function searchRelacionesCurso($idcurso)
    {
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

    public function searchcursodocentes(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        if ($request->has('id')) {
            $id = $request->input("id");
            $searchv = $request->input("search.value");
            $pagesize = $lenght != null ? $lenght : 0;
            $skip = $start != null ? $start : 0;
            
            $totalRecords = 0;
            $idcurso = Cursoprecio::find($id)->curso_id;
            $v = Docente::where('deleted_at', null)
            ->wherehas('cursos', function ($sql) use ($idcurso) {
                $sql->where('curso_id', $idcurso);
            });
            
            if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
                $v = $v->orderBy($sortColumn, $sortColumnDir);
            }
        
            $totalRecords = Count($v->get());
            $data = $v->Skip($skip)->Take($pagesize)->get();
        
            return response()->Json([
            'draw' => $draw,
            'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
        } else {
            return response()->Json([
        'draw' => $draw,
        'recordsFiltered' => 0,
        'recordsTotal' => 0,
        'data' => '']);
        }
    }
            
    public function updatepreciocurso(Request $request)
    {
        try {
            $id=$request->input('id');
            $precio = CursoPrecio::find($id);
            $precio->deleted_at=date('Y-m-d H:i:s');
            $precio->save();

            $cursoprecio = new CursoPrecio();
            $cursoprecio->curso_id = $precio->curso_id;
            $cursoprecio->Precio = $request->input('Precio');

            
            $cursoprecio->save();

            return response()->json([
                'message'=>'exito']);
        } catch (Exception $e) {
            DB::rollback();

            $this->removeUpload($curso->Image_URL);
            $this->removeUpload($curso->Temario_URL);

            return report($e);
        }
    }

    public function store(CursoRequest $request)
    {
        DB::beginTransaction();
        
        $curso = new Curso();
        
        try {
            $curso->NombreCurso = $request->input('NombreCurso');
            $curso->Image_URL = $this->uploadphoto($request);
            $curso->Temario_URL = $this->uploadpdf($request);
            $curso->Desc_Publicidad = $request->input('Desc_Publicidad');
            $curso->Desc_Introduccion = $request->input('Desc_Introduccion');
            $curso->InfoAdicional = $request->input('InfoAdicional');
            $curso->categoria_id = $request->input('categoria_id');
            $curso->isVirtual = $request->input('isVirtual');
            $curso->isPresencial = $request->input('isPresencial');
            $curso->isSemiPresencial = $request->input('isSemiPresencial');

            $curso->save();
            
            $cursoprecio = new CursoPrecio();
            $cursoprecio->curso_id = $curso->id;
            $cursoprecio->Precio = $request->input('Precio');
            
            $cursoprecio->save();

            $docentes = $request->input('docentes');
            if (count($docentes)>0) {
                $curso->docentes()->attach($docentes);
            }

            $etiquetas = $request->input('etiquetas');
            if (count($etiquetas)>0) {
                $curso->etiquetas()->attach($etiquetas);
            }

            $competencias = $request->input('competencias');
            
            if (Count($competencias)>0) {
                for ($i=0; $i < Count($competencias); $i++) {
                    $competenciacurso = new Competenciacurso();
                    $competenciacurso->curso_id = $curso->id;
                    $competenciacurso->Competencia = $competencias[$i];
                    
                    $competenciacurso->save();
                }
            } else {
                DB::rollback();
                
                $this->removeUpload($curso->Image_URL);
                $this->removeUpload($curso->Temario_URL);
                
                return response()->json([
                    'error'=>'Se debe agregar al menos una competencia para el curso'
                ]);
            }

            $tematicas = $request->input('tematicas');
            $tematicasduracion = $request->input('duracion');

            if (Count($tematicas)>0) {
                for ($i=0; $i < Count($tematicas); $i++) {
                    $tematica = new Cursotematica();
                    $tematica->curso_id = $curso->id;
                    $tematica->Tematica = $tematicas[$i];
                    $tematica->Duracion = $tematicasduracion[$i];
                    
                    $tematica->save();
                }
            } else {
                DB::rollback();

                $this->removeUpload($curso->Image_URL);
                $this->removeUpload($curso->Temario_URL);
                
                return response()->json([
                    'error'=>'Se debe agregar al menos una tematica para el curso'
                ]);
            }

            $modalidades = $request->input('modalidades');
            $modalidadeshorario = $request->input('horarios');

            if (Count($modalidades)>0) {
                for ($i=0; $i < Count($modalidades); $i++) {
                    $modalidad = new Cursomodalidad();
                    $modalidad->curso_id = $curso->id;
                    $modalidad->Modalidad = $modalidades[$i];
                    $modalidad->Horario = $modalidadeshorario[$i];
                    
                    $modalidad->save();
                }
            } else {
                DB::rollback();

                $this->removeUpload($curso->Image_URL);
                $this->removeUpload($curso->Temario_URL);

                return response()->json([
                    'error'=>'Se debe agregar al menos una modalidad para el curso'
                ]);
            }

            $requisitos = $request->input('requisitos');
       
            if (Count($requisitos)>0) {
                for ($i=0; $i < Count($requisitos); $i++) {
                    $requisito = new Cursorequisito();
                    $requisito->curso_id = $curso->id;
                    $requisito->Requisito = $requisitos[$i];
                    
                    $requisito->save();
                }
            } else {
                DB::rollback();
                
                $this->removeUpload($curso->Image_URL);
                $this->removeUpload($curso->Temario_URL);

                return response()->json([
                    'error'=>'Se debe agregar al menos un requisito para el curso'
                ]);
            }

            DB::commit();

            return response()->json([
                'message'=>'exito'
            ]);
        } catch (Exception $e) {
            DB::rollback();

            $this->removeUpload($curso->Image_URL);
            $this->removeUpload($curso->Temario_URL);

            return report($e);
        }
    }
    public function update(CursoRequest $request, $id)
    {
        DB::beginTransaction();
        $subioFoto =false;
        $subioPDF =false;
        $cursoprecio = CursoPrecio::find($id);
        $original = $cursoprecio->curso;
       
        try {
            if ($original == null) {
                return response()->json([
                    'error'=>'El curso no ha sido encontrada en la base de datos'
                ]);
            }

            $curso = new Curso();
            $curso->NombreCurso = $request->input('NombreCurso');
            $curso->Desc_Publicidad = $request->input('Desc_Publicidad');
            $curso->Desc_Introduccion = $request->input('Desc_Introduccion');
            $curso->InfoAdicional = $request->input('InfoAdicional');
            $curso->categoria_id = $request->input('categoria_id');
            $curso->isVirtual = $request->input('isVirtual');
            $curso->isPresencial = $request->input('isPresencial');
            $curso->isSemiPresencial = $request->input('isSemiPresencial');

            $curso->Image_URL = $request->input('Image_URL');
            $curso->Temario_URL = $request->input('Temario_URL');
            
            $original->NombreCurso = $curso->NombreCurso;
            $original->Desc_Publicidad = $curso->Desc_Publicidad ;
            $original->Desc_Introduccion = $curso->Desc_Introduccion;
            $original->InfoAdicional = $curso->InfoAdicional;
            $original->categoria_id =$curso->categoria_id;
            $original->isVirtual =$curso->isVirtual;
            $original->isPresencial =$curso->isPresencial;
            $original->isSemiPresencial =$curso->isSemiPresencial;

            if ($original->Image_URL != $request->input('Image_URL')) {
                $this->removeUpload($original->Image_URL);
                $original->Image_URL = $this->uploadphoto($request);
                $subioFoto=true;
            }

            if ($original->Temario_URL != $request->input('Temario_URL')) {
                $this->removeUpload($original->Temario_URL);
                $original->Temario_URL = $this->uploadpdf($request);
                $subioPDF =true;
            }

            $original->save();


            $docentes = $request->input('docentes');
            
            $original->docentes()->sync($docentes);
            
            $etiquetas = $request->input('etiquetas');
            
            $original->etiquetas()->sync($etiquetas);
            
            if ($request->has('idcompetencias') == false) {
                DB::rollback();
                if ($subioFoto) {
                    $this->removeUpload($original->Image_URL);
                }

                if ($subioPDF) {
                    $this->removeUpload($original->Temario_URL);
                }
                return response()->json([
                    'error'=>'Se debe agregar al menos una competencia para el curso'
                ]);
            }

            $competencias = $request->input('competencias');
            $idcompetencias = $request->input('idcompetencias');

            Competenciacurso::where('curso_id', $original->id)->where('deleted_at', null)
            ->whereNotIn('id', $idcompetencias)
            ->update(array('deleted_at' => date('Y-m-d H:i:s')));
            
            if (Count($competencias)>0) {
                for ($i=0; $i < Count($competencias); $i++) {
                    $competenciacurso = new Competenciacurso();
                    
                    if ($idcompetencias[$i] == 0) {
                        $competenciacurso->curso_id = $original->id;
                    } else {
                        $competenciacurso = Competenciacurso::find($idcompetencias[$i]);
                    }

                    $competenciacurso->Competencia = $competencias[$i];

                    $competenciacurso->save();
                }
            } else {
                DB::rollback();
                if ($subioFoto) {
                    $this->removeUpload($original->Image_URL);
                }

                if ($subioPDF) {
                    $this->removeUpload($original->Temario_URL);
                }

                return response()->json([
                    'error'=>'Se debe agregar al menos una competencia para el curso'
                ]);
            }

            if ($request->has('idtematicas') == false) {
                DB::rollback();
                if ($subioFoto) {
                    $this->removeUpload($original->Image_URL);
                }

                if ($subioPDF) {
                    $this->removeUpload($original->Temario_URL);
                }
                return response()->json([
                    'error'=>'Se debe agregar al menos una tematica para el curso'
                ]);
            }

            $tematicas = $request->input('tematicas');
            $tematicasduracion = $request->input('duracion');
            $idtematicas = $request->input('idtematicas');
             
            Cursotematica::where('curso_id', $original->id)->where('deleted_at', null)
                ->whereNotIn('id', $idtematicas)
                ->update(array('deleted_at' => date('Y-m-d H:i:s')));
            
                
            if (Count($tematicas)>0) {
                for ($i=0; $i < Count($tematicas); $i++) {
                    $tematica = new Cursotematica();
                    
                    if ($idtematicas[$i] == 0) {
                        $tematica->curso_id = $original->id;
                    } else {
                        $tematica = Cursotematica::find($idtematicas[$i]);
                    }
                    
                    $tematica->Tematica = $tematicas[$i];
                    $tematica->Duracion = $tematicasduracion[$i];

                    $tematica->save();
                }
            } else {
                DB::rollback();

                if (file_exists(public_path($curso->Image_URL))) {
                    unlink(public_path($curso->Image_URL));
                }
                if (file_exists(public_path($curso->Temario_URL))) {
                    unlink(public_path($curso->Temario_URL));
                }
                
                return response()->json([
                    'error'=>'Se debe agregar al menos una tematica para el curso'
                ]);
            }

            if ($request->has('idmodalidades') == false) {
                DB::rollback();
                if ($subioFoto) {
                    $this->removeUpload($original->Image_URL);
                }

                if ($subioPDF) {
                    $this->removeUpload($original->Temario_URL);
                }
                return response()->json([
                    'error'=>'Se debe agregar al menos una modalidad para el curso'
                ]);
            }

            $modalidades = $request->input('modalidades');
            $modalidadeshorario = $request->input('horarios');
            $idmodalidades = $request->input('idmodalidades');

            Cursomodalidad::where('curso_id', $original->id)->where('deleted_at', null)
                ->whereNotIn('id', $idmodalidades)
                ->update(array('deleted_at' => date('Y-m-d H:i:s')));


            if (Count($modalidades)>0) {
                for ($i=0; $i < Count($modalidades); $i++) {
                    $modalidad = new Cursomodalidad();
                    
                    if ($idmodalidades[$i] == 0) {
                        $modalidad->curso_id = $original->id;
                    } else {
                        $modalidad = Cursomodalidad::find($idmodalidades[$i]);
                    }
                    
                    $modalidad->Horario = $modalidadeshorario[$i];
                    $modalidad->Modalidad = $modalidades[$i];

                    $modalidad->save();
                }
            } else {
                DB::rollback();

                if (file_exists(public_path($curso->Image_URL))) {
                    unlink(public_path($curso->Image_URL));
                }
                if (file_exists(public_path($curso->Temario_URL))) {
                    unlink(public_path($curso->Temario_URL));
                }

                return response()->json([
                    'error'=>'Se debe agregar al menos una modalidad para el curso'
                ]);
            }

            if ($request->has('idrequisitos') == false) {
                DB::rollback();
                if ($subioFoto) {
                    $this->removeUpload($original->Image_URL);
                }

                if ($subioPDF) {
                    $this->removeUpload($original->Temario_URL);
                }
                return response()->json([
                    'error'=>'Se debe agregar al menos un requisito para el curso'
                ]);
            }

            $requisitos = $request->input('requisitos');
            $idrequisitos = $request->input('idrequisitos');

            Cursorequisito::where('curso_id', $original->id)->where('deleted_at', null)
                ->whereNotIn('id', $idrequisitos)
                ->update(array('deleted_at' => date('Y-m-d H:i:s')));

            if (Count($requisitos)>0) {
                for ($i=0; $i < Count($requisitos); $i++) {
                    $requisito = new Cursorequisito();
                    
                    if ($idrequisitos[$i] == 0) {
                        $requisito->curso_id = $original->id;
                    } else {
                        $requisito = Cursorequisito::find($idrequisitos[$i]);
                    }
                    
                    $requisito->Requisito = $requisitos[$i];

                    $requisito->save();
                }
            } else {
                DB::rollback();
                
                if (file_exists(public_path($curso->Image_URL))) {
                    unlink(public_path($curso->Image_URL));
                }
                if (file_exists(public_path($curso->Temario_URL))) {
                    unlink(public_path($curso->Temario_URL));
                }

                return response()->json([
                    'error'=>'Se debe agregar al menos un requisito para el curso'
                ]);
            }

            DB::commit();

            return response()->json([
                'message'=>'exito'
            ]);
        } catch (Exception $e) {
            DB::rollback();

            if ($subioFoto) {
                $this->removeUpload($original->Image_URL);
            }

            if ($subioPDF) {
                $this->removeUpload($original->Temario_URL);
            }

            return report($e);
        }
    }
  
    public function destroy($id)
    {
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

    public function uploadphoto(Request $request)
    {
        $f = new uploadPhoto();
        return $f->upload($request, "img/Resources/cursos");
    }

    public function uploadpdf(Request $request)
    {
        $f = new uploadPhoto();
        return $f->uploadPDF($request, "temarios");
    }

    public function removeUpload(String $dir)
    {
        if (file_exists(public_path($dir))) {
            unlink(public_path($dir));
        }
    }
}
