<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends ModelController
{

    public function __construct() {
        $this->object = new Teacher();
        $this->objectName = 'teacher';
        $this->objectNames = 'teachers';
        $this->relactionships = [];
    }

    public function listContacts()
    {
        $teachers = Teacher::with('user')->get();

        $students = Student::with('user')->get();

//        $contacts = Tel



        return view('communications.contacts',['teachers'=>$teachers,'students'=> $students, 'user' => Auth::user()]);
    }

}