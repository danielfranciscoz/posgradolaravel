<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Http\Requests\ComentariosRequest;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::where('deleted_at',null)->orderBy('created_at','DESC')->take(6)->get();
        
        return view('Comentarios.index')->with(compact('comentarios'));
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
            $original->Image_URL = $comentario->Image_URL;
            
            $original->save();

            return response()->json([
                'message'=>'exito.'
            ]);
    
        } catch (Exception $e) {
            return report($e);
        }
}

    public function AsignarData(ComentariosRequest $request){

    $comentario = new Comentario();
    $comentario->Nombre = $request->input('Nombre');
    $comentario->Profesion = $request->input('Profesion');
    $comentario->Desc_Pais = $request->input('Desc_Pais');
    $comentario->Comentario = $request->input('Comentario');
    $comentario->Image_URL = $request->input('Image_URL');
    
    return $comentario;
    
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
                'message'=>'exito.'
            ]);
            
        } catch (Exception $e) {
            return report($e);
        }
    }
}
