<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


public function __construct()
{
    $this->middleware(['auth','verified']);
    
}



    /**
     * Create a new controller instance.
     *
     * @return void
     */
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function user()
    {
      
        if(Auth::check() && Auth::user()->role_id == 1){
            
         
         //$this->redirectTo = route('admin.dashboard');
           dd(Auth::user());

        } elseif(Auth::check() && Auth::user()->role_id == 2){

           dd(Auth::user());


           // $this->redirectTo = route('user.dashboard');
        }
    }
}
