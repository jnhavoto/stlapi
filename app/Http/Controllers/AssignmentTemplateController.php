<?php

namespace App\Http\Controllers;

use App\Models\AssignmentTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentTemplateController extends ModelController
{
    public function __construct() {
        $this->object = new AssignmentTemplate();
        $this->objectName = 'assignment_template';
        $this->objectNames = 'assignment_template';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }

    public function openCreteAssignTemplate()
    {
        return view('design.form_assign_template', [
            'user' => Auth::user(),
            'userd' => Auth::user(),
            ]);

    }

    public function openCreteACourseTemplate()
    {
        return view('design.form_course_template', [
            'user' => Auth::user(),
            'userd' => Auth::user(),]);

    }


    public function createAssignTemplate(Request $request)
    {
        DB::beginTransaction();
        //create group_teacher
       $assign_template = AssignmentTemplate::create(
                [
                    'number' => $request->number,
                    'case' => $request->case,
                    'Instructions' => $request->instructions,
                ]
            );
        DB::commit();
        return redirect('/admin_assignment_templates');


    }

    public function createCourseTemplate(Request $request)
    {
        return $request;
        DB::beginTransaction();
        //create group_teacher
       $assign_template = AssignmentTemplate::create(
                [
                    'name' => $request->name,
                    'course_content' => $request->course_content,
                ]
            );
        DB::commit();
        return redirect('/admin_assignment_templates');


    }
}
