<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
   // protected $redirectTo;

    

    //protected $redirectTo =   return redirect()->route('admin.dashboard');
    //protected $redirectTo = '/user/dashboard';

 protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     /*    dd($this->middleware('auth'),  $this->middleware('signed')->only('verify'),$this->middleware('throttle:6,1')->only('verify', 'resend'));
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');  */

       // dd(Auth::check() ,Auth::user(),(Auth::check() && Auth::user()->role_id == 2));

        if(Auth::check() && Auth::user()->role_id == 1){

            
            $this->redirectTo = route('admin.dashboard');
        } elseif(Auth::check() && Auth::user()->role_id == 2){
            $this->redirectTo = route('admin.dashboard');
        }  
       

        return redirect()->route('logout');
        $this->middleware('guest')->except('logout');



    }
}
