<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function redirectTo()
    {

        if(Auth::user()['user_types_id'] == 1){
            $user = Auth::user();
            $user->last_login = now();
            $user->save();
            //return $user->last_login;
            return '/admin';
        }

        if (Auth::user()['user_types_id'] == 2){
            $user = Auth::user();
            $user->last_login = now();
            return '/';
        }

        if (Auth::user()->student)
            return '/login';

        return '/not-found';

    }


}
