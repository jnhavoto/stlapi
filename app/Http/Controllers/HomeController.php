<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentTemplate;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\User;
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
//        return Auth::user()->id;
        //update the last_login date


        $assignTeacher = $teacherAssignment = $teacher->assignment_descriptions()->get();
//        return $assignTeacher;
//        $assignTeacher = AssignmentDescriptionsHasTeacher::with('assignment_description')->
//        where('teachers_id', $teacher_id)->get();
//        return $assignTeacher;
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
        'user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
//        return $request
        $userdata = User::where('id',$request->user_id)->first();

        $userdata -> update([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => $request->password,
        ]);
        return redirect('/')->with('succes', 'Data has been successfully sent!');
    }

    public function admin_index()
    {
        //get details of logged user:
        $user = Auth::user();
//        return $user;
        //List all assignments that have been created
        $assignTemplates = AssignmentTemplate::all();
        //List all assignment Descriptions
        $assignments = AssignmentDescription::all();
        //
        $teacher = Teacher::where('users_id',Auth::user()->id)->first();

        //students
        $students = Student::all();

        //instructors
        $teachers = Teacher::all();
        //
        $users = User::paginate(15);

        $login_users = User::whereNotNull('last_login')->orderBy('last_login')->get();

        return view('dashboard.admin_index',[
            'assignTemplates' => $assignTemplates,
            'assignments' => $assignments,
            'teachers' => $teachers, 'students' => $students,
            'users' => $users,
            'lastlogin_users' => $login_users,
            'userd' => $user,
        ]);
    }

    public function createAssignTemplete()
    {

        return view ('dashboard.admin_index');
    }


}
