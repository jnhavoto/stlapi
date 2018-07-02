<?php

namespace App\Http\Controllers;

use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherMember;
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

        return view('communications.contacts',['teachers'=>$teachers,'students'=> $students, 'user' => Auth::user()]);
    }

    public function getAllCourses()
    {
        $teacher = Teacher::Where('users_id',Auth::user()->id)->first();
        $courses= $teacher->courses;

        return view('activities.course',['courses'=>$courses,'user' => Auth::user()]);
    }

    public function getAllAssignments()
    {
//        $teacher = Teacher::Where('users_id',Auth::user()->id)->first();
        $teacher = Teacher::Where('users_id',Auth::user()->id)->first();
        $teachers_members = TeacherMember::Where('teachers_id',$teacher->id)->get();
        $assignments = collect();
//        return $teachers_members[0];
//
        for ($j=0; $j<count($teachers_members);$j++){

            $list=$teachers_members[$j]->group_teacher->assignment_descriptions;
            for($i=0; $i<count($list);$i++){
                $assignments->push($list[$i]);
//                return $assignments;
            }
    }

        return view('activities.assignment',['assignments'=>$assignments,'user' => Auth::user()]);
    }

}