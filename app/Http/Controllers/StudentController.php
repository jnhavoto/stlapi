<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index($id)
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


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $student=Student::find($id);
        return response()->json($student,200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
