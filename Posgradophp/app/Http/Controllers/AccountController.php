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

    public function registrar(){
       DB::beginTransaction();   
       try {
            $user = new User();
            $estudent = new Estudiante();
    
            $user->name = 'dfzamora';
            $user->email = 'danielfranciscoz@hotmail.com';
            $user->password = bcrypt('123456Aa');
            $user->isAdmin = false;     
            
            // $user->save();
    
            $estudent->user_id = 1;
            $estudent->Nombres  = 'Daniel Francisco';
            $estudent->Apellidos = 'Zamora Muñoz';
            $estudent->DNI = '0012112950023A';
            $estudent->Telefono = '87715274';
            $estudent->isSuscript =true;
    
            // $estudent->save();

            

            Mail('emails.confirmation',$estudent,function($message) use ($estudent,$user){
                $message->to($user->email,($estudent->Nombres))->subject('UNI Posgrado - Confirmación de cuenta');
            });

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return report($e);
        }
  
    }    

    public function carrito(){

            return view("Account/carrito");

    }

    public function pagarcarrito(){

        $user= Auth::user()->with('estudiante')->first();
        $estudiante = $user->estudiante()->get();
    //   dd($estudiante[0]->Nombres);
        if(Session::has('cartItems') && Auth::guard(null)->check()){
            return view("Account/pagarcarrito")->with(compact('estudiante'));
        }
        else{
            return view("Account/carrito");
        }

    }

    public function loginUser(Request $request){
        try {

            $this->login($request);

            return response()->json([
                'message'=>'success'
            ]);


        } catch (Exception $e) {
            return report($e);
        }
    }

    }
