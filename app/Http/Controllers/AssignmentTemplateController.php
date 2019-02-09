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

    public function editAssignTemplateForm($id)
    {
//        return AssignmentTemplate::findOrFail($id);
        return view('design.edit-assign-template', [
            'user' => Auth::user(),
            'userd' => Auth::user(),
            'assigntemplate' => AssignmentTemplate::findOrFail($id),
        ]);
    }

    public function editAssignTemplate(Request $request)
    {
        $assign_template = AssignmentTemplate::find($request->assigntemplate_id);
        $assign_template->number = $request->number;
        $assign_template->case = $request->case;
        $assign_template->instructions = $request->instructions;
        $assign_template->save();

        return redirect('/admin_assignment_templates');
    }

    public function deleteAssignTemplate($id)
    {
//return CoursesTemplate::where('id', $id)->get();
        AssignmentTemplate::where('id', $id)->get()->each->delete();

        return redirect('/admin_assignment_templates');
    }



}
