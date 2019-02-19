<?php
namespace App\Clases;

use Illuminate\Http\Request;

class uploadPhoto 
{
    
    public function __construct(){}

    public function upload(Request $request,String $dir){
        
        // $image = $request->file('Imagen');
        // $new_name =  rand().'.'.$image->getClientOriginalExtension();
        // $image->move(public_path($dir),$new_name);
        
        // //Local
        // if (env('APP_ENV')=='Local')
        // {
        //     return $dir.'/'.$new_name;
        // }else{
        //     return 'laravel/public/'.$dir.'/'.$new_name;
        // }
        return $this->uploadFile($request,$dir,'Imagen');
        //Para el servidor
        // return 'laravel/public/'.$dir.'/'.$new_name;
    }

    public function uploadPDF(Request $request,String $dir){          
        return $this->uploadFile($request,$dir,'Temario');       
    }

    private function uploadFile(Request $request,String $dir,String $field){
        
        $file = $request->file($field);
        $new_name =  rand().'.'.$file->getClientOriginalExtension();
        $file->move(public_path($dir),$new_name);
        
        //Local
        if (env('APP_ENV')=='local')
        {
            return $dir.'/'.$new_name;
        }else{
            return 'laravel/public/'.$dir.'/'.$new_name;
        }
        
        //Para el servidor
        // return 'laravel/public/'.$dir.'/'.$new_name;
    }
    
}