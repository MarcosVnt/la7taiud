<?php

namespace App\Http\Controllers;

use App\User;
use App\Plato;
use App\Alergeno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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
            $plato->imagen = $request->imagen;

            $plato->save();


          

            $plato->familias()->attach($request->familia_id);

            foreach ($request->alergenos as $alergeno) {

              $a = '';
              $a = Alergeno::where('nombre','=',$alergeno)->first();
             
              
              if($a) {

              // dd($a->id);
              $plato->alergenos()->attach($a->id);
              
            }else{
             // dd('else');
            }

                  
              //
             // $plato->alergenos()->attach($alergeno->);
          }
          



          // dd($plato->familia()->attach($request->familia_id));

          
            
        }
        return ['plato' => $plato];



      //  dd($request);
    }


    public function delete(Request $request,Plato $plato){

//     dd($request, $plato);
  //  $plato = Plato::find($request->id);

        // dd($request->familia_id,$plato, $plato->familia);



     $plato->familias()->detach($request->familia_id);

     //$user->roles()->detach($roleId);
     if( File::exists( 'storage/establecimiento/'.$plato->establecimiento_id.'/'. $plato->imagen ) ) {

     // dd($plato->establecimiento_id,$plato->imagen ,'existe');
    
     if( File::delete( 'storage/establecimiento/'.$plato->establecimiento_id.'/'. $plato->imagen )){
       dd('borrado',$plato);
     }
  }


      
    
      
  
  return ['plato' => $plato];



//  dd($request);
}


}
