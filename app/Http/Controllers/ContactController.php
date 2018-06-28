<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    public function Chats()
    {
        return view('communications.chats',['user' => Auth::user()]);
    }
}
