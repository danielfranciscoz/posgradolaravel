<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;
use App\User;
use App\Models\Estudiante;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Mail\ConfirmationUser;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // dd('Auth::user()');
    }

    public function registro(){
        // dd(Auth::user());
        return view("Account/registro");
    }

    public function registrar(RegisterRequest $request){
       //Poner como parametro RegisterRequest $request
       
         DB::beginTransaction();   
       try {
            $user = new User();
            $estudent = new Estudiante();
    
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->isAdmin = false;     
            $user->token = str_random(50);
            
            $user->save();
    
            $estudent->user_id = $user->id;
            $estudent->Nombres  = $request->input('Nombres');
            $estudent->Apellidos = $request->input('Apellidos');
            $estudent->DNI = $request->input('DNI');
            $estudent->Telefono = $request->input('Telefono');
            $estudent->isSuscript =$request->input('isSuscript');
    
             $estudent->save();

           
            Mail::to($user->email)
                    ->send((new ConfirmationUser($user,$estudent))->locale('es'));
            
            //La línea de abajo funciona para visualizar lo que será enviado por correo
            //  return (new ConfirmationUser($user,$estudent))->render();
        
             DB::commit();
              
             return response()->json([
                'message'=>'Te hemos enviado un correo, por favor revisa tu bandeja de entrada para verificar tu cuenta, sino lo encuentras prueba buscar en los correos no deseados.'
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return report($e);
        }
  
    }    

    public function verificar($token){

        try{
            $user = User::where('token',$token)->first();
            
            if($user->email_verified_at == null){
                $user->email_verified_at=date('Y-m-d H:i:s');                
                $user->save();
                
                return response()->json([
                    'message'=>'Muchas gracias por verificar tu cuenta, ahora estamos listos, ya puedes empezar a aprender con nosotros.'
                ]);
            }else{
                return response()->json([
                    'message'=>'Esta cuenta ya se encuentra verificada.'
                ]);
            }

        } catch (Exception $e) {
            return report($e);
        }
    }

    public function carrito(){

            return view("Account/carrito");

    }

    public function pagarcarrito(){

        //   dd($estudiante[0]->Nombres);
        if(Session::has('cartItems') && Auth::guard(null)->check()){
            $user= Auth::user()->with('estudiante')->first();
            $estudiante = $user->estudiante()->get();
            return view("Account/pagarcarrito")->with(compact('estudiante'));
        }
        else{
            return view("Account/carrito");
        }

    }

    public function loginUser(Request $request){
        try {
            $user = User::where('email',$request->input('email'))->first();
            if (!empty($user)) {
            
                if($user->email_verified_at == null){
                    return response()->json([
                        'message'=>'Hemos detectado que el usuario aún no ha verificado su cuenta, por favor revise su correo y verifique su cuenta para poder proceder al inicio de sesión'
                        ]);
                    }else{
                        $this->login($request);
            
                        return response()->json([
                            'message'=>'success'
                        ]);
                    }                   
            }else{
                return response()->json([
                    'error'=>'El usuario no se encuentra registrado'
                ]);
            }


        } catch (Exception $e) {
            return report($e);
        }
    }

    }
