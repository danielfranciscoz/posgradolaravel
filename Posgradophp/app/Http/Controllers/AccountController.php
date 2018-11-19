<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class AccountController extends Controller
{
    
    public function registro(){

        $categorias = Categoria::all()->where('deleted_at',null);
        return view("Account/registro",compact('categorias'));

    
    }
    public function carrito(){

        $categorias = Categoria::all()->where('deleted_at',null);
        return view("Account/carrito",compact('categorias'));

    }

}
