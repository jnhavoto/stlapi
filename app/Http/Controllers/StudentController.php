<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\GroupsAssignmentDescription;
use App\Models\Student;
use App\Models\StudentMember;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends ModelController
{

    public function __construct() {
        $this->object = new Student();
        $this->objectName = 'student';
        $this->objectNames = 'students';
        $this->relactionships = [];
    }

    public function getLastAssignmentDescription(Request $request)
    {

        $student = Student::where('id','=',$request->id)->first();

        $members = StudentMember::select('groups_id')
            ->where('students_id','=',$student->id)
            ->orderBy('id','DESC')
            ->first();

        $groupAssignmentDescription = GroupsAssignmentDescription::select('assignment_descriptions_id')
            ->where('groups_id','=',$members->groups_id)
            ->orderBy('created_at','DESC')
            ->first();


        $assignmentDescription = AssignmentDescription::where('id','=',$groupAssignmentDescription->assignment_descriptions_id)->first();

        return response()->json(['result' => $assignmentDescription]);

    }


    public function getStudantAssigment($student_id, $assignment_id){
        $assignmentSubmition = Student::find($student_id)
            ->join('assignment_submissions', 'students.id', 'assignment_submissions.students_id')
            ->where('assignment_submissions.id', '=', $assignment_id);
    }


}
