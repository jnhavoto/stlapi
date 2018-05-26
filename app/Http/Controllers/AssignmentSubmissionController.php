<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;

class AssignmentSubmissionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentSubmission();
        $this->objectName = 'assignment_submission';
        $this->objectNames = 'assignment_submissions';
        $this->relactionships = [];
    }




    public function getAssignmentSubmition($student_id, $assignment_desc_id){
        $assignment_sub =  AssignmentSubmission::where('assignment_descriptions_id', '=', $assignment_desc_id)->where('students_id', '=', $student_id)->get();
        return ['assignmnent_submition' => $assignment_sub];
    }


    public function store(Request $request){
        return $request->all();
    }



}