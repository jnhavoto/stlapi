<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactController extends Controller
{
    public function Chats()
    {
        return view('communications.chats',['user' => Auth::user()]);
    }

//    public function listChats()
//    {
//        return view('communications.chats',[])
//    }
}
