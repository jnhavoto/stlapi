<?php

namespace App\Http\Controllers;

use App\Models\AssignmentMaterial;
use Illuminate\Http\Request;

class AssignmentMaterialController extends ModelController
{
    public function __construct() {
        $this->object = new AssignmentMaterial();
        $this->objectName = 'assignment_material';
        $this->objectNames = 'assignment_material';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }
}
