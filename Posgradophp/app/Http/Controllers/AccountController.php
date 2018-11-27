<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class AccountController extends Controller
{
    
    public function registro(){
        return view("Account/registro");

    
    }
    public function carrito(){
        return view("Account/carrito");

    }

}
