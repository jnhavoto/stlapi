<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\Teacher;
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


    public function submitAssignment(Request $request)
    {

        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();


        DB::beginTransaction();

        $group_teacher = GroupTeacher::create(

            [
                'group_name' => $request->case,
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
                    'available_date' => $request->available_date,
                    'group_teachers_id' => $group_teacher->id,
                ]

            );

        }

        if ($assigment and $teacher_member) {

            DB::commit();

            redirect('/assignments');

        } else {
            DB::rollBack();
            return "Error when save Assignment Description or Teacher Member";

        }

    }


}