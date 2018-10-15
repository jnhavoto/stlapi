<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function getCalendar()
    {
        return view('design.calendar',['user' => Auth::user()]);
    }
}
