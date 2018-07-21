<?php

namespace App\Http\Controllers;

use App\Models\AssignmentTemplate;
use Illuminate\Http\Request;

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
}
