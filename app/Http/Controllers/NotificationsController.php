<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function getNotifications()
    {
        return view('communications.notifications',['user' => Auth::user()]);
    }
}
