<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentSubmission;
use App\Models\AssignmentTemplate;
use App\Models\Course;
use App\Models\CoursesTemplate;
use App\Models\Department;
use App\Models\Feedback;
use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends ModelController
{

    public function __construct()
    {
        $this->object = new Teacher();
        $this->objectName = 'teacher';
        $this->objectNames = 'teachers';
        $this->relactionships = [];
    }

    public function listContacts()
    {
        $teachers = Teacher::with('user')->get();

        $students = Student::with('user')->get();

        return view('communications.contacts', ['teachers' => $teachers, 'students' => $students, 'user' => Auth::user()]);
    }
    public function admin_listContacts()
    {
        $teachers = Teacher::all();

        $students = Student::all();

        //get all users
        $users = User::all();

        return view('communications.admin_users', ['teachers' => $teachers, 'students' => $students, 'users' => $users, 'user' => Auth::user()]);
    }

    public function getCourses()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        $teacherCourses = $teacher->courses;
//return $teacherCourses;
        $coursesTemplates = CoursesTemplate::all();

        return view('design.course',
            ['courseTemplates' => $coursesTemplates,
                'teacherCourses'=>$teacherCourses,
                'teachers' => $teachers,
                'user' => Auth::user()]);
    }

//    Assignments Overview
    public function getAssignmentsOverview()
    {
        //first get all assignments
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        //getting the ist of members where the teacher is part of
        $teachers_members = TeacherMember::Where('teachers_id', $teacher->id)->get();
        $assignmentTeacher = AssignmentDescriptionsHasTeacher::Where('teachers_id',$teacher->id)->get();
        $teacher_assignments = collect();
        //getting teacher courses
        $teacherCourses = $teacher->courses;
//        return $teachers_members[0];
//

        for ($j = 0; $j < count($teachers_members); $j++) {

            $list = $teachers_members[$j]->group_teacher->assignment_descriptions;
            for ($i = 0; $i < count($list); $i++) {
                $teacher_assignments->push($list[$i]);
//                return $assignments;
            }
        }

//        return ($teacher_assignments);

//        return $courses;
        return view('monitoring.assignments-overview',
            [
                'teacher_assignments' => $teacher_assignments,
                'teachers' => $teachers,
                'teacherCourses' => $teacherCourses,
                'user' => Auth::user()
            ]);
    }

    public function getAllAssignmentSubmissions()
    {
//        $student = Student::Where('students_id', $teacher->id)->get();
        $assignSubmissions = AssignmentSubmission::all();
//        return $assignSubmissions;
        return view('monitoring.assignments-overview',['assSubmissions' => $assignSubmissions,
        'user' => Auth::user()]);
    }

    public function submitAssignment2(Request $request)
    {
//        return $request;
        $assignment = new AssignmentDescription();
        $assignment->case = $request->case;
        $assignment->instructions = $request->instructions;
        $assignment->startdate = $request->startdate;
        $assignment->deadline = $request->deadline;
        $assignment->available_date = $request->available_date;
        return $assignment;

    }




    public function updateTeacher($id)
    {
        $teacher = Teacher::where('id',$id)->get()->each->delele();
    }


}