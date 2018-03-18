<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Method to get all course
     */
    public function getAllCourses()
    {

        $courses= Course::all();

        return response()->json(['courses'=>$courses],200);
    }

    /**
     * Method to get one specific course
     */
    public function getCourse($id)
    {

    }


    /**
     * Method to store a course
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Method to update a course data
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Method to delete a course
     */
    public function destroy($id)
    {
        //
    }
}
