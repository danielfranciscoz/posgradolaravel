<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
        return view('cms/categorias');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        try {
            $categoria = $this->AsignarData($request);
            $categoria->Image_URL = $this->uploadphoto($request);

            $categoria->save();
            
            return response()->json([
                'message'=>'exito'
            ]);
        } catch (Exception $e) {
            return report($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        $categoria = $this->AsignarData($request);
        $categoria->Image_URL = $request->input('Image_URL');
        $original = Categoria::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'La categoria no ha sido encontrada en la base de datos'
            ]);
        }

       try {
    
            $original->isCursoPosgrado = $categoria->isCursoPosgrado;
            $original->Categoria = $categoria->Categoria;
            $original->Descripcion = $categoria->Descripcion;
            $original->Descripcion_larga = $categoria->Descripcion_larga;
            
            if($original->Image_URL != $request->input('Image_URL'))
            {
                if(file_exists(public_path($original->Image_URL))){
                    unlink(public_path($original->Image_URL));
                }
                $original->Image_URL = $this->uploadphoto($request);
            }

            $original->save();

            return response()->json([
                'message'=>'exito'
            ]);
    
        } catch (Exception $e) {
            return report($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $original = Categoria::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'La categoria no ha sido encontrada en la base de datos'
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

    public function AsignarData(CategoriaRequest $request){

        $categoria = new Categoria();
        $categoria->isCursoPosgrado = $request->input('isCursoPosgrado');
        $categoria->Categoria = $request->input('Categoria');
        $categoria->Descripcion = $request->input('Descripcion');
        $categoria->Descripcion_larga = $request->input('Descripcion_larga');
        
        return $categoria;
        
    }

    public function searchcategorias(Request $request){

        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        $v = Categoria::where('deleted_at',null);

        // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
        
        if (strlen($searchv) !=0) {
            $v = $v->Where('Categoria','LIKE','%'.$searchv.'%');
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

    
    public function uploadphoto(Request $request){
     
        $image = $request->file('Imagen');
        $new_name =  rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("img/Resources/categorias"),$new_name);
        return 'img/Resources/categorias/'.$new_name;
    }
}
