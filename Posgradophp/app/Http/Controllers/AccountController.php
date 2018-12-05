<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Session;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AccountController extends Controller
{
    use AuthenticatesUsers;

    public function registro(){
        // dd(Auth::user());
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

   
    }
