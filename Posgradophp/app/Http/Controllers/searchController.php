<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class searchController extends Controller
{
    public function search($ss){
        return view("search/search")->with('busquedas', $ss);;


    }
}
