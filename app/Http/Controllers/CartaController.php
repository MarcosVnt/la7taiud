<?php

namespace App\Http\Controllers;

use App\User;
use App\Carta;
use App\Familia;
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



    public function update(Request $request, Carta $carta){



     
     $carta = Carta::find($request->id);

   //  dd($carta->id,$request->id,$cart);
      if($carta){

        $carta->nombre = $request->nombre;
        $carta->orden = $request->orden;
 //       $carta->establecimiento_id = $request->establecimiento_id;
        $carta->save();

      }

        

          
            
        
        return ['carta' => $carta];



      //  dd($request);
    }

    public function delete(Request $request){


            $carta = Carta::find($request->id);          
            //$carta->get();
          
            //carta

            //familias
            $familias = Familia::where('carta_id', $carta->id)->get();


            
            foreach ($familias as $familia) {
                //
                $familia->platos()->detach();
            }
            
            $carta->delete();
           // $familias->delete();

            //familia_platos
            
            
        
        return ['carta' => $carta, 'familias' => $familias];



      //  dd($request);
    }
}
