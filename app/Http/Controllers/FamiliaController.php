<?php

namespace App\Http\Controllers;

use App\User;
use App\Familia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamiliaController extends Controller
{
    //



    public function store(Request $request){

        if(Auth::check() ){

            $user = User::find(Auth::user()->id);
            $establecimiento = $user->establecimiento->id;

            $carta = new Familia();
            $carta->nombre = $request->nombre;
            $carta->orden = $request->orden;
            $carta->carta_id = $request->cartaId;
            $carta->save();

           // dd($request,$user->establecimiento);

          
            
        }
        return ['subCarta' => $carta];



      //  dd($request);
    }
}
