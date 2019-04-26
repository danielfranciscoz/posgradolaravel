<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocentesRequest;
use App\Models\Docente;
use App\Clases\uploadPhoto;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.docentes');
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
    public function store(DocentesRequest $request)
    {
        try {
            $docente = $this->AsignarData($request);
            $docente->Image_URL = $this->uploadphoto($request);

            $docente->save();
            
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
    public function update(DocentesRequest $request, $id)
    {
        $docente = $this->AsignarData($request);
        $docente->Image_URL = $request->input('Image_URL');
        $original = Docente::find($id);
        
        if ($original == null) {
    
            return response()->json([
                'error'=>'El docente no ha sido encontrado en la base de datos'
                
            ]);
        }

        try {            
    
            $original->Nombres = $docente->Nombres;
            $original->Profesion = $docente->Profesion;
            $original->Descripcion = $docente->Descripcion;
            $original->LinkedIn_URL = $docente->LinkedIn_URL;
            $original->updatet_at =date('Y-m-d H:i:s');            
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
        $original = Docente::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'El docente no ha sido encontrado en la base de datos'
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

        $docente = new Docente();
        $docente->Nombres = $request->input('Nombres');
        $docente->Profesion = $request->input('Profesion');
        $docente->Descripcion = $request->input('Descripcion');
        $docente->LinkedIn_URL = $request->input('LinkedIn_URL');
       
        return $docente;
        
    }

    public function searchdocentes(Request $request){

        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        $v = Docente::where('deleted_at',null);

        // return  response()->Json(['sortColumn'=> $sortColumn,'sortColumnDir'=>$sortColumnDir]);
        
        if (strlen($searchv) !=0) {
            $v = $v->Where('Nombres','LIKE','%'.$searchv.'%');
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
        return $f->upload($request,"img/Resources/docentes");
    }
}
