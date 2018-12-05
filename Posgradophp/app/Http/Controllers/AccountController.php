<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
