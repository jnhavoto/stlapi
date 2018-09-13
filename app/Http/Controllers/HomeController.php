<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use App\Models\AssignmentDescriptionsHasCourse;
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

        $assignTeacher = $teacherAssignment = $teacher->assignment_descriptions()->get();
//            AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
//        $teacher->id)->get();
       // return $assignTeacher;

        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $teacherCourses;
        $countAssign = 0;
        foreach ($teacherCourses as $course)
        {
            $counting = AssignmentDescriptionsHasCourse::where('courses_id',$course->courses_id)->get()->count();
            $countAssign=$countAssign+$counting;
        }

        return view('dashboard.index',[
            'teacherCourses'=>$teacherCourses,
            'countAssign'=>$countAssign,
//            'announcements'=>$announcements,
//            'submissions'=>$submissions,
//            'feedbacks'=>$feedbacks,
            'assignTeacher'=>$assignTeacher,
        'user' =>
            Auth::user()]);
    }
}
