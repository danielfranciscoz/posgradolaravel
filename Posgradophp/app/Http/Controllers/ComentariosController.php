<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Http\Requests\ComentariosRequest;
use Illuminate\Support\Facades\Storage;
use App\Clases\uploadPhoto;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('cms/comentarios');
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
    public function store(ComentariosRequest $request)
    {
        try {
            $comentario = $this->AsignarData($request);
            $comentario->Image_URL = $this->uploadphoto($request);

            $comentario->save();
            
            return response()->json([
                'message'=>'exito.'
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
    public function update(ComentariosRequest $request, $id)
    {
                
        $comentario = $this->AsignarData($request);
        $comentario->Image_URL = $request->input('Image_URL');
        $original = Comentario::find($id);
        
        if ($original == null) {
    
            return response()->json([
                'error'=>'El comentario no ha sido encontrado en la base de datos'
                
            ]);
        }

        try {            
    
            $original->Nombre = $comentario->Nombre;
            $original->Profesion = $comentario->Profesion;
            $original->Desc_Pais = $comentario->Desc_Pais;
            $original->Comentario = $comentario->Comentario;
            $original->updated_at =date('Y-m-d H:i:s');  
            
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
        $original = Comentario::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'El comentario no ha sido encontrado en la base de datos'
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

    public function AsignarData(Request $request){

        $comentario = new Comentario();
        $comentario->Nombre = $request->input('Nombre');
        $comentario->Profesion = $request->input('Profesion');
        $comentario->Desc_Pais = $request->input('Desc_Pais');
        $comentario->Comentario = $request->input('Comentario');
       
        
        return $comentario;
        
    }

    public function searchcomentarios(Request $request){

        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        $v = Comentario::where('deleted_at',null);

        // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
        
        if (strlen($searchv) !=0) {
            $v = $v->Where('Nombre','LIKE','%'.$searchv.'%');
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
        $f = new uploadPhoto();
        return $f->upload($request,"img/Resources/estudiantes");
    }
}
