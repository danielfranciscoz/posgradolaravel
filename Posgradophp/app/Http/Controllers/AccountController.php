<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    
    public function registro(){
        return view("Account/registro");

    }
}
