<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentSubmission;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends  ModelController
{

    public function __construct() {
        $this->object = new Course();
        $this->objectName = 'course';
        $this->objectNames = 'courses';
        $this->relactionships = [];
    }

    public function getAllCourses()
    {
        $courses = Course::with('user')->get();
        return view('activities.course',['courses'=>$courses,'user' => Auth::user()]);
    }

    public function courseOverview(Request $request)
    {
        //get course details
        $course = Course::where('id', $request->id)->get();
        //get all assignments of this course
        $courseAssignemts = AssignmentDescription::where('courses_id',$request->id)->get();
//        get all submitted assignments of this course
        $submissions = collect();
//        for ($j = 0; $j < count($courseAssignemts); $j++) {
//            //get current Assignmentdescription id
//            $assignDescrID = AssignmentDescription::where('id',$)
//            $assignSubmission = AssignmentSubmission::where('assignment_descriptions_id',);
//            for ($i = 0; $i < count($list); $i++) {
//                $teacher_assignments->push($list[$i]);
////                return $assignments;
//            }
//        }
        foreach ($courseAssignemts as $assignment )
        {
            $submission = AssignmentSubmission::where('assignment_descriptions_id',$assignment->id)->get();
            $submissions ->push($submission);
        }
//        return $submissions;

        return view('activities.course-overview', ['course' => $course, 'courseAssignments' => $courseAssignemts,
            'submissions' => $submissions,
            'user'=>Auth::user()]);
    }
}