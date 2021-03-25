<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
    //
    public function index(Request $request, Establecimiento $establecimiento)
    {

        dd($request, $establecimiento);
        
        
    }
}
