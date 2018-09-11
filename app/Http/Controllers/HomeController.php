<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentSubmission;
use App\Models\Feedback;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::where('users_id',Auth::user()->id)->first();
//        return $teacher;
        $assignments = AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
        $teacher->id)->get();
//        return $assignments;

        //get announcements
//        $announcements = AssignmentAnnouncement::where('assignment_descriptions_id',$assignments->id)->get();
//
//        //get submissions
//        $submissions = AssignmentSubmission::where('assignment_descriptions_id',$assignments->id)->get();
//        //get feedbacks
//        $feedbacks = Feedback::where('assignment_descriptions_id',$assignments->id)->get();
        //get ratings
//        $ratings = Ratin


        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $teacherCourses;
        return view('dashboard.index',[
            'teacherCourses'=>$teacherCourses,
//            'announcements'=>$announcements,
//            'submissions'=>$submissions,
//            'feedbacks'=>$feedbacks,
            'assignmentsTeacher'=>$assignments,
        'user' =>
            Auth::user()]);
    }
}
