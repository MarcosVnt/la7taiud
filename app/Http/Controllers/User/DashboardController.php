<?php

namespace App\Http\Controllers\User;

use App\Establecimiento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function __construct() 
    {

      $this->middleware(['auth','verified']);

      
    
    }


   
    public function index()
    {
      //   dd('encontrado',Auth::user()->establecimiento,Establecimiento::where('user_id','=',Auth::user()->id));

      
      /*   if(Auth::check() && Auth::user()->role_id == 1){
           $this->redirectTo = route('admin.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo = route('user.dashboard');
        }
 */

if(Auth::user()->establecimiento){

 /*  dd('si establecimiento',
  Auth::user()->establecimiento,Establecimiento::where('user_id','=',Auth::user()->id)); */
  $establecimiento= Auth::user()->establecimiento;
  return view('establecimientos.index',compact('establecimiento'));


}else{
  //dd('no establecimiento', Auth::user()->establecimiento,Establecimiento::where('user_id','=',Auth::user()->id));

  $establecimiento= new Establecimiento();

  $establecimiento->user_id = Auth::user()->id;
  $establecimiento->save();
  
  return view('establecimientos.create',compact('establecimiento'));


}

        if(Establecimiento::where('user_id','=',Auth::user()->id)){


          // dd('encontrado');
           $establecimiento= Establecimiento::where('user_id','=',Auth::user()->id)->firstOrFail();
           dd('encontrado',$establecimiento);
          // return view('establecimientos.index',compact('establecimiento'));

          //  return view('establecimientos.index' with('usuario', Auth::user()->id));
        }else{
           dd('no encontrado',Auth::user()->id,Establecimiento::where('user_id','=',Auth::user()->id));
           // $user= Auth::user()->id;
            //return view('establecimientos.index',compact('user'));
            //return view('establecimientos.create');

        }
        dd(Auth::user());
    
    
        //
       // return 'dasboard';
      
    }




}
