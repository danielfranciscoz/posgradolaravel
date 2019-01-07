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
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Rules\ValidRecaptcha;

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
        $user = new User();
        $user->email = $request->input('email');
        $user->token = str_random(50);
        
        DB::beginTransaction();   
        try {
            $estudent = new Estudiante();
            
            $user->name = $user->email;
            $user->password = bcrypt($request->input('password'));

            $user->isAdmin = false;     
            
            $user->save();
    
            $estudent->user_id = $user->id;
            $estudent->PrimerNombre  = $request->input('PrimerNombre');
            $estudent->SegundoNombre  = $request->input('SegundoNombre');
            $estudent->PrimerApellido = $request->input('PrimerApellido');
            $estudent->SegundoApellido = $request->input('SegundoApellido');
            $estudent->DNI = $request->input('DNI');
            $estudent->Telefono = $request->input('Telefono');
            $estudent->isSuscript =$request->input('isSuscript');
    
             $estudent->save();

           
            // Mail::to($user->email)
            //         ->send((new ConfirmationUser($user,$estudent))->locale('es'));
            
            $this->sendConfirmationMail($user,$estudent);
            
            //La línea de abajo funciona para visualizar lo que será enviado por correo
            //  return (new ConfirmationUser($user,$estudent))->render();
        
             DB::commit();
              
             //'Te hemos enviado un correo, por favor revisa tu bandeja de entrada para verificar tu cuenta, sino lo encuentras prueba buscar en los correos no deseados.'
            return response()->json([
                'message'=> $user->token
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'error'=>'Ocurrió un error y n o pudimos completar el registro, por favor intenta mas tarde.'
            ]);        
        }
  
    }    

    public function RegistroCompleto($token){
        
        $user = User::where('token',$token)->first();
        if($user==null){
            return response()->json([
                'error'=>'La información del usuario es incorrecta.'
            ]);        
        }else{
            return view('Account/registrocompleto')->with(compact('user'));
        }
    }

    private function sendConfirmationMail($user,$estudent=null){
        if ($estudent == null) {
            Mail::to($user->email)
                        ->send((new ConfirmationUser($user,$user->estudiante))->locale('es'));            
            } else{                        
            Mail::to($user->email)
                        ->send((new ConfirmationUser($user,$estudent))->locale('es'));            
        }
    }

    public function ReEmail(Request $request){
        
        $validatedData = $request->validate([
            'token' => 'required',
            'g-recaptcha-response' => ['required', new ValidRecaptcha],
        ]);

        $token = $request->input('token');

        $user = User::where('token',$token)->first();
        if($user==null){
            return response()->json([
                'error'=>'La información del usuario es incorrecta.'
            ]);        
        }
        
        $this->sendConfirmationMail($user,null);
        return response()->json([
            'message'=>'exito'
        ]);
    }

    public function verificar($token){

        try{
            $user = User::where('token',$token)->first();
            if ($user != null) {
                if ($user->email_verified_at == null) {
                    $user->email_verified_at=date('Y-m-d H:i:s');
                    $user->save();
                
               
                    $message = 'Muchas gracias por verificar tu cuenta, ahora estamos listos, ya puedes empezar a aprender con nosotros.';
                    /* response()->json([
                        'message'=>
                    ]) */;
                    return view("Account/verificar")->with(compact('user'))
                ->with(compact('message'));
                } else {
                    $message ='Esta cuenta ya se encuentra verificada.';
                    /* return response()->json([
                        'message'=>'Esta cuenta ya se encuentra verificada.'
                    ]); */

                    return view("Account/verificar")->with(compact('user'))
                ->with(compact('message'));
                }
            }else{
                $message ='No fue posible encontrar al usuario, es probable que la cuenta ya haya sido verificada o que se esté usando un identificador no válido.';                    
                    return view("Account/verificar")->with(compact('message'));
            }

        } catch (Exception $e) {
            return report($e);
        }
    }

    public function carrito(){

            return view("Account/carrito");

    }

    public function resumencarrito(){

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

    public function PagarCarrito(){
    
    }

    public function loginUser(Request $request){
        try {
            $user = User::where('email',$request->input('email'))->first();
            // dd(Auth::user()->estudiante->Nombres);
            if (!empty($user)) {
            
                if($user->email_verified_at == null && $user->isAdmin==false){
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
                    'message'=>'El usuario no se encuentra registrado'
                ]);
            }


        } catch (Exception $e) {
            return report($e);
        }
    }

    public function reset(){
        return view('Account.resetpassword.reset');
    }

    public function sendEmailreset(Request $request){

        try {        
            $validatedData = $request->validate([
                'g-recaptcha-response' => ['required', new ValidRecaptcha],
            ]);
                
            $email = $request->input('email');

            $user = User::where('email',$email)->first();
            
            if ($user != null) {
                $user->token = str_random(40);
                $user->save();

                Mail::to($email)->send((new ResetPassword($user))->locale('es'));
                // return (new ResetPassword($user))->render();

                return response()->json([
                    'message'=>'Te hemos enviado un correo, por favor revisa tu bandeja de entrada, sino lo encuentras prueba buscar en los correos no deseados.'
                    ]);
            }else{
                return response()->json([
                    'error'=>'El correo que has ingresado, no se encuentra registrado en nuestra plataforma, verifica tu información e intenta nuevamente.'
                    ]);
            }

        } catch (Exception $e) {
            return report($e);
        }
    }

    public function changepass($token){

        $user = User::where('token',$token)->first();
        if($user == null){
            return response()->json([
                'error'=>'El identificador no es válido, es probable que se esté intentando acceder a una URL antígua, o exista otra petición de cambio de contraseña mas reciente.'
                ]);
        }
        return view('Account.resetpassword.changepass')->with(compact('user'));
    }

    public function resetpassword(Request $request){
        $token = $request->input('token');
        $password = $request->input('password');

        $user = User::where('token',$token)->first();
        
        if ($user == null) {
            return response()->json([
                'error'=>'El identificador no es válido, es probable que la contraseña ya haya sido restablecida.'
                ]);
        }

        $user->password = bcrypt($password);
        $user->token = str_random(15);

        $user->save();

        return response()->json([
            'message'=>'Ya puedes iniciar sesión, tu contraseña ha sido modificada con éxito.'
            ]);
    }

}
