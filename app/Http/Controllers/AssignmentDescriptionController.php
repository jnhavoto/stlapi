<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentDescriptionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentDescription();
        $this->objectName = 'assignment_description';
        $this->objectNames = 'assignment_descriptions';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }

    public function updateAssignment(Request $request){
        //get an assignment by id
        $assignment = AssignmentDescription::find($request->assignment_id);

        $assignment->case = $request->case;
        $assignment->number = $request->number;
        $assignment->instructions = $request->instructions;
        $assignment->startdate = $request->startdate;
        $assignment->deadline = $request->deadline;
        $assignment->available_date = $request->availabledate;
        $assignment->course_id = $request->course_id;
        $assignment->save();

        return  redirect('/assignments');



    }


}
