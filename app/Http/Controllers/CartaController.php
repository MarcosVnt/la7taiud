<?php

namespace App\Http\Controllers;

use App\User;
use App\Carta;
use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartaController extends Controller
{
    //
    public function index(Request $request, Establecimiento $establecimiento)
    {

        dd($request, $establecimiento);
        
        
    }



    public function store(Request $request){

        if(Auth::check() ){

            $user = User::find(Auth::user()->id);
            $establecimiento = $user->establecimiento->id;

            $carta = new Carta;
            $carta->nombre = $request->nombre;
            $carta->orden = $request->orden;
            $carta->establecimiento_id = $establecimiento;
            $carta->save();

           // dd($request,$user->establecimiento);

          
            
        }
        return ['carta' => $carta];



      //  dd($request);
    }
}
