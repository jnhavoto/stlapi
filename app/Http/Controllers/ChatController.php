<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getAllChats()
    {
        return view('communications.chats',['user' => Auth::user()]);
    }

}
