<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;

class AccountController extends Controller
{
    
    public function registro(){
        return view("Account/registro");

    
    }
    public function carrito(){
 
            return view("Account/carrito");
        
    }

    public function pagarcarrito(){
       /*  if(Session::has('login') && Session::has('login')){ */
            return view("Account/pagarcarrito");
       /*  }
        else{
            abort(404);
        } */

    }

    public function login(Request $request){
        try{
            $user= $request->input('user');
            $pass= $request->input('pass');


            if($user=='yasser.montiel@dtic.uni.edu.ni' && $pass=="123456aA"){
                if(Session::has('login'))
                    {
                        Session::forget('login');
                    }
                Session::push('login', [
                    'user' => $user,
                    'Nombre' => 'Yasser',
                    'token' => '4568da4d682e4a6sd628e412e'
                    
                    ]); 
                    return response()->json([               
                        'message' => 'sucess'
                        ]);
               

               
            }
            else{
                return response()->json([
                    'error' => 'Correo o clave Incorrectas.',
                    'message' => 'error'
                    ]);

            }
            
            }
            CATCH(\Exception $e){
                return response()->json([
                    'error' => 'Ocurrio un error en el sistema. Intente mas luego.',
                    'message' => 'error'
                    ]);
            }

    }

}
