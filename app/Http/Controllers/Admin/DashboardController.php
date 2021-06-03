<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Publicidad;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        //
        
       $publicidads = Publicidad::where('user_id', auth()->user()->id )->latest()->simplePaginate(3);
      // dd($publicidads);
               return view('publicidads.index',compact('publicidads'));


    }
}
