<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactController extends Controller
{
    public function getAllContacts()
    {
        return view('communications.contacts',['user' => Auth::user(),'i' => 0]);

    }

}
