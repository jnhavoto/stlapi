<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends ModelController
{


    public function __construct() {
        $this->object = new Student();
        $this->objectName = 'student';
        $this->objectNames = 'students';
        $this->relactionships = ["city", "school"];
    }


//    public function get($id)
//    {
//        $student=DB::table('students')
//            ->join('cities', 'students.city_id', '=', 'cities.city_id')
//            ->join('schools', 'students.school_id', '=', 'schools.school_id')
//            ->join('users', 'students.user_id', '=', 'users.user_id')
//            ->select('students.*','users.first_name','users.last_name','users.email','users.telephone','cities.city_name','schools.school_name')
//            ->where('students_id','=',$id)
//            ->first();
//        return response()->json(['resultado'=> $student],200);
//    }



}
