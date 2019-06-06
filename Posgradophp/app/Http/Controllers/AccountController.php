<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;
use App\User;
use App\Models\Estudiante;
use App\Models\Pago;
use App\Models\Detallepago;
use App\Models\Curso;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterRequest;
use App\Mail\ConfirmationUser;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Rules\ValidRecaptcha;
use App\Models\Cursoprecio;

class AccountController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // dd('Auth::user()');
    }

    public function index()
    {
        return view('cms/usuarios');
    }

    public function registro()
    {
        // dd(Auth::user());
        return view("Account/registro");
    }

    public function registrar(RegisterRequest $request)
    {
        //Poner como parametro RegisterRequest $request
        $user = new User();
        $user->email = $request->input('email');
        $user->token = str_random(50);
        
        DB::beginTransaction();
        try {
            $estudent = new Estudiante();
            
            $user->name = $user->email;
            $user->password = bcrypt($request->input('password'));

            if ($request->has('isAdmin')) {
                $user->isAdmin = true;
            } else {
                $user->isAdmin = false;
            }
            
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
            if ($request->has('isAdmin') ==false) {
                $this->sendConfirmationMail($user, $estudent);
            }
            
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
                'error'=>'Ocurrió un error y no pudimos completar el registro, por favor intenta mas tarde.'
            ]);
        }
    }
     
    public function store(RegisterRequest $request)
    {
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'PrimerNombre' =>'required',
            'PrimerApellido' =>'required',
            'DNI' =>'required',
            'Telefono' => 'required',
        ]);
                
        $original = User::find($request->input('id'));

        if ($original == null) {
            return response()->json([
                'error'=>'El usuario no ha sido encontrado en la base de datos'
                
            ]);
        }

        try {
            $original->updated_at =date('Y-m-d H:i:s');
            
            $original->save();
            
            $estudent = Estudiante::find($original->id);
       
            $estudent->user_id  = $original->id;
            $estudent->PrimerNombre  = $request->input('PrimerNombre');
            $estudent->SegundoNombre  = $request->input('SegundoNombre');
            $estudent->PrimerApellido = $request->input('PrimerApellido');
            $estudent->SegundoApellido = $request->input('SegundoApellido');
            $estudent->DNI = $request->input('DNI');
            $estudent->Telefono = $request->input('Telefono');
            $estudent->isSuscript =$request->input('isSuscript');
            $estudent->updated_at =date('Y-m-d H:i:s');
            $estudent->save();

            return response()->json([
                'message'=>'exito'
            ]);
        } catch (Exception $e) {
            return report($e);
        }
    }

    public function destroy($id)
    {
        $original = User::find($id);

        if ($original == null) {
            return response()->json([
                'error'=>'El usuario no ha sido encontrado en la base de datos'
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

    public function resetPasswordAdmin(Request $request)
    {
        $password = $request->input('password');
        $id = $request->input('id');
        
        $user = User::find($id);
        
        if ($user == null) {
            return response()->json([
                'error'=>'El usuario no ha sido encontrado en la base de datos'
            ]);
        }

        $user->password = bcrypt($password);
        
        $user->save();

        return response()->json([
            'message'=>'Exito'
            ]);
    }

    public function RegistroCompleto($token)
    {
        $user = User::where('token', $token)->first();
        if ($user==null) {
            return response()->json([
                'error'=>'La información del usuario es incorrecta.'
            ]);
        } else {
            return view('Account/registrocompleto')->with(compact('user'));
        }
    }

    private function sendConfirmationMail($user, $estudent=null)
    {
        if ($estudent == null) {
            Mail::to($user->email)
                        ->send((new ConfirmationUser($user, $user->estudiante))->locale('es'));
        } else {
            Mail::to($user->email)
                        ->send((new ConfirmationUser($user, $estudent))->locale('es'));
        }
    }

    public function ReEmail(Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required',
            'g-recaptcha-response' => ['required', new ValidRecaptcha],
        ]);

        $token = $request->input('token');

        $user = User::where('token', $token)->first();
        if ($user==null) {
            return response()->json([
                'error'=>'La información del usuario es incorrecta.'
            ]);
        }
        
        $this->sendConfirmationMail($user, null);
        return response()->json([
            'message'=>'exito'
        ]);
    }

    public function verificar($token)
    {
        try {
            $user = User::where('token', $token)->first();
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
            } else {
                $message ='No fue posible encontrar al usuario, es probable que la cuenta ya haya sido verificada o que se esté usando un identificador no válido.';
                return view("Account/verificar")->with(compact('message'));
            }
        } catch (Exception $e) {
            return report($e);
        }
    }

    public function carrito()
    {
        return view("Account/carrito");
    }

    public function resumencarrito()
    {
        if (Session::has('cartItems') && Auth::guard(null)->check()) {
            $estudiante = Auth::user()->estudiante;
            return view("Account/pagarcarrito")->with(compact('estudiante'));
        } else {
            return view("Account/carrito");
        }
    }

    public function PagarCarrito($Referencecode)
    {
        if (Auth::guard(null)->check()) {
            $user = Auth::user();
            $estudiante = $user->estudiante;
            $pago = Pago::where('reference_code', $Referencecode)->where('user_id', $user->id)->first();
            
            if ($pago != null) {
              
                $curso = Curso::join('cursoprecios', 'cursos.id', '=', 'cursoprecios.curso_id')
                ->join('detallepagos', 'cursoprecios.id','=','detallepagos.cursoprecio_id')
                ->where('detallepagos.pago_id',$pago->id)->get();
  
                return view("Account/pagocarrito")
                            ->with(compact('user'))
                            ->with(compact('estudiante'))
                            ->with(compact('curso'))
                            ->with(compact('pago'));
            } else {
                abort(403, 'Acceso denegado, Este contenido no se encuentra disponible.');
            }
        } else {
            abort(403, 'Acceso denegado, Este contenido no se encuentra disponible.');
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $user = User::where('email', $request->input('email'))->first();
            // dd(Auth::user()->estudiante->Nombres);
            if (!empty($user)) {
                if ($user->email_verified_at == null && $user->isAdmin==false) {
                    return response()->json([
                        'message'=>'Hemos detectado que el usuario aún no ha verificado su cuenta, por favor revise su correo y verifique su cuenta para poder proceder al inicio de sesión'
                        ]);
                } else {
                    $this->login($request);
            
                    return response()->json([
                            'message'=>'success'
                        ]);
                }
            } else {
                return response()->json([
                    'message'=>'El usuario no se encuentra registrado'
                ]);
            }
        } catch (Exception $e) {
            return report($e);
        }
    }

    public function reset()
    {
        return view('Account.resetpassword.reset');
    }

    public function sendEmailreset(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'g-recaptcha-response' => ['required', new ValidRecaptcha],
            ]);
                
            $email = $request->input('email');

            $user = User::where('email', $email)->first();
            
            if ($user != null) {
                $user->token = str_random(40);
                $user->save();

                Mail::to($email)->send((new ResetPassword($user))->locale('es'));
                // return (new ResetPassword($user))->render();

                return response()->json([
                    'message'=>'Te hemos enviado un correo, por favor revisa tu bandeja de entrada, sino lo encuentras prueba buscar en los correos no deseados.'
                    ]);
            } else {
                return response()->json([
                    'error'=>'El correo que has ingresado, no se encuentra registrado en nuestra plataforma, verifica tu información e intenta nuevamente.'
                    ]);
            }
        } catch (Exception $e) {
            return report($e);
        }
    }

    public function changepass($token)
    {
        $user = User::where('token', $token)->first();
        if ($user == null) {
            return response()->json([
                'error'=>'El identificador no es válido, es probable que se esté intentando acceder a una URL antígua, o exista otra petición de cambio de contraseña mas reciente.'
                ]);
        }
        return view('Account.resetpassword.changepass')->with(compact('user'));
    }

    public function resetpassword(Request $request)
    {
        $token = $request->input('token');
        $password = $request->input('password');

        $user = User::where('token', $token)->first();
        
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
      
    public function addcarrito(Request $request)
    {
        $id= $request->input('curso');
        // $request->session()->flush();
        $curso = Cursoprecio::with('curso')->where('curso_id', $id)->where('deleted_at',null)->get();
        
        if (count($curso) == 0) {
            return response()->json([
                'error' => 'Se encuentra intentando agregar un curso que no existe',
                'message' => 'error'
                ]);
        }

        $existid = false;

        $caritems = Session::get('cartItems');
        
        if (is_array($caritems)) {
            $count = count($caritems);
        } else {
            $count=0;
        }

        for ($i=0;$i<$count;$i++) {
            if (Session::get('cartItems')[$i]['id']== $id) {
                return response()->json([
                'error' => 'Ya fue agregado al carrito',
                'message' => 'error'
                ]);
                $existid = true;
            }
        }
    
        if ($existid == false) {
            Session::push('cartItems', [
            'id' => $curso->get(0)->id, //Tabla precioCurso
            'curso' => $curso->get(0)->Curso()->get()[0]->NombreCurso, //tabla curso
            'Image_URL'=> $curso->get(0)->Curso()->get()[0]->Image_URL,
            'horas' =>  $curso->get(0)->Curso()->get()[0]->HorasClase,
            'Precio' => $curso->get(0)->Precio
            
            ]);
        }

        return response()->json([
            'message' => Session::get('cartItems')]);
    }

    public function delcarrito(Request $request)
    {
        $id= $request->input('curso');
        $existid = false;
        
        $caritems = Session::get('cartItems');

        if (is_array($caritems)) {
            $count = count($caritems);
        } else {
            $count=0;
        }

        if ($count > 0) {
            for ($i=0;$i<$count;$i++) {
                if (Session::get('cartItems')[$i]['id']== $id) {
                    $existid == true;
                        
                    $arraysession = $caritems;
                    Session::forget('cartItems');
                        
                    unset($arraysession[$i]);
                        
                    foreach ($arraysession as $data) {
                        Session::push('cartItems', $data);
                    }
       
                    return response()->json([
                            
                            'message' => Session::get('cartItems')
                            ]);
                }
            }
        }
        if ($existid==false) {
            return response()->json([
                'error' => 'Elemento del carrito no existe o ya fue eliminado',
                'message' => 'error'
                ]);
            $existid = true;
        }
    }

    public function searchusuarios(Request $request)
    {
        $draw = $request->input("draw");
        $start = $request->input("start");
       
        $lenght = $request->input("length");

        $sortColumn = $request->input("columns." . $request->input("order.0.column") . ".name");
        $sortColumnDir = $request->input("order.0.dir");
        
        $searchv = $request->input("search.value");
        $pagesize = $lenght != null ? $lenght : 0;
        $skip = $start != null ? $start : 0;
        
        $totalRecords = 0;

        $v = User::leftJoin('estudiantes', 'users.id', '=', 'estudiantes.user_id')
        ->select('users.id', 'users.email', 'users.isAdmin', 'users.created_at', 'estudiantes.PrimerNombre', 'estudiantes.SegundoNombre', 'estudiantes.PrimerApellido', 'estudiantes.SegundoApellido', 'estudiantes.DNI', 'estudiantes.Telefono', 'estudiantes.isSuscript')
        ->where('users.deleted_at', null);
        
        if (strlen($searchv) !=0) {
            $v = $v->Where('PrimerNombre', 'LIKE', '%'.$searchv.'%')
                    ->orWhere('SegundoNombre', 'LIKE', '%'.$searchv.'%')
                    ->orWhere('PrimerApellido', 'LIKE', '%'.$searchv.'%')
                    ->orWhere('SegundoApellido', 'LIKE', '%'.$searchv.'%')
                    ->getQuery();
        } else {
            $v = $v->getQuery();
        }
        
        if (strlen($sortColumn) !=0 && strlen($sortColumnDir) !=0) {
            $v = $v->orderBy($sortColumn, $sortColumnDir);
        }
        
        $totalRecords = Count($v->get());
        $data = $v->Skip($skip)->Take($pagesize)->get();
        
        return response()->Json([
                'draw' => $draw,
                'recordsFiltered' => $totalRecords,
                'recordsTotal' => $totalRecords,
                'data' => $data ]);
    }
}
