<?php

namespace App\Http\Controllers;

use App\User;
use App\Plato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlatoController extends Controller
{
    //


    public function store(Request $request){

        if(Auth::check() ){

            $user = User::find(Auth::user()->id);
            $establecimiento = $user->establecimiento->id;

            $plato = new Plato();
            $plato->nombre = $request->nombre;
            //$plato->orden = $request->orden;
            
            $plato->observaciones = $request->descripcion;
            $plato->precio = $request->precio;
            $plato->moneda = $request->moneda;
            
            $plato->establecimiento_id = $establecimiento;
            $plato->save();


            $plato->familia()->attach($request->familia_id);


          // dd($plato->familia()->attach($request->familia_id));

          
            
        }
        return ['plato' => $plato];



      //  dd($request);
    }


    public function delete(Request $request,Plato $plato){

    // dd($request->familia_id, $plato->familias);
  //  $plato = Plato::find($request->id);

        // dd($request->familia_id,$plato, $plato->familia);



     $plato->familia()->detach($request->familia_id);

     //$user->roles()->detach($roleId);


      
    
      
  
  return ['plato' => $plato];



//  dd($request);
}


}
