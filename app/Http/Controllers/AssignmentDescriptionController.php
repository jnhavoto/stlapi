<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentDescriptionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentDescription();
        $this->objectName = 'assignment_description';
        $this->objectNames = 'assignment_description';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }
}
