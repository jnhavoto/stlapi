<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    /**
     * Method to get all students
     */
    public function getAllstudents()
    {

    }

    /**
     * Method to get one specific student
     */
    public function getStudent($id)
    {

        $student=DB::table('students')
            ->join('cities', 'students.city_id', '=', 'cities.city_id')
            ->join('schools', 'students.school_id', '=', 'schools.school_id')
            ->join('users', 'students.user_id', '=', 'users.user_id')
            ->select('students.*','users.first_name','users.last_name','users.email','users.telephone','cities.city_name','schools.school_name')
            ->where('student_id','=',$id)
            ->first();
        return response()->json(['resultado'=> $student],200);
    }


    /**
     * Method to store a student
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Method to update a student data
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Method to delete a student
     */
    public function destroy($id)
    {
        //
    }


}
