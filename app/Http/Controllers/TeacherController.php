<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\Course;
use App\Models\Department;
use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
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

    public function getAllCourses()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $courses = $teacher->courses;

        return view('activities.course', ['courses' => $courses, 'user' => Auth::user()]);
    }

    public function getAllAssignments()
    {
//        $teacher = Teacher::Where('users_id',Auth::user()->id)->first();
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers_members = TeacherMember::Where('teachers_id', $teacher->id)->get();
        $assignments = collect();
//        return $teachers_members[0];
//
        for ($j = 0; $j < count($teachers_members); $j++) {

            $list = $teachers_members[$j]->group_teacher->assignment_descriptions;
            for ($i = 0; $i < count($list); $i++) {
                $assignments->push($list[$i]);
//                return $assignments;
            }
        }

        return view('activities.assignment', ['assignments' => $assignments, 'user' => Auth::user()]);
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

    public function getAssignmentDetails()
    {

    }



    public function submitAssignment(Request $request)
    {
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        $group_teacher = GroupTeacher::create(

            [
                'group_name' => 'Default Name',
            ]

        );


        if (!$group_teacher) {

            DB::rollBack();
            return ['Error when save GroupTeacher'];

        } else {

            $teacher_member = TeacherMember::create(

                [
                    'teachers_id' => $teacher->id,
                    'group_teachers_id' => $group_teacher->id,
                ]

            );

            $assigment = AssignmentDescription::create(

                [
                    'case' => $request->case,
                    'instructions' => $request->instructions,
                    'startdate' => $request->startdate,
                    'deadline' => $request->deadline,
                    'available_date' => $request->availabledate,
                    'group_teachers_id' => $group_teacher->id,
                ]

            );

        }

        if ($assigment and $teacher_member) {

            DB::commit();

            return redirect('/assignments');

        } else {
            DB::rollBack();
            return "Error when save Assignment Description or Teacher Member";

        }

    }

    public function submitCourse(Request $request){
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        //get the department name from the user
        $department = Department::Where('name',$request->name);
        //create the course with content from the form
        $course = Course::create(
            [
                'name' => $request->name,
                'course_content' => $request->course_content,
                //get the department id from the name the user chose in the form
//                'department_id' => $request->$department->id,
                'departments_id' => 1,
            ]
        );
        //associate the course with the teacher
        $teacher_course = TeacherCourse::create(
            [
                'teachers_id' => $teacher->id,
                'courses_id' => $course->id,
            ]

        );
        //enrol all student on this course
        $students = Student::all();
        foreach ($students as $student)
        {
            $student_course = StudentsCourse::create(
                [
                    'students_id' => $student->id,
                    'courses_id' => $course->id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => 0,
                ]
            );
        }
        //check if course and tecaher_course have any error: if not, then write on the DB
        if ($course and $teacher_course and $student_course) {

            DB::commit();

            return redirect('/courses');

        }

    }


}