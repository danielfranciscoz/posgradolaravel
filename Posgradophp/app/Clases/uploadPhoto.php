<?php
namespace App\Clases;

use Illuminate\Http\Request;

class uploadPhoto 
{
    
    public function __construct(){}

    public function upload(Request $request,String $dir){
        
        $image = $request->file('Imagen');
        $new_name =  rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path($dir),$new_name);
        return $dir.'/'.$new_name;
    }
    
}