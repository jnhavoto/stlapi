<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescriptionsHasCourse;
use Illuminate\Http\Request;


class AssignmentDescriptionHasCourseController extends ModelController
{
    public function __construct() {
        $this->object = new AssignmentDescriptionsHasCourse();
        $this->objectName = 'assignment_description_has_course';
        $this->objectNames = 'assignment_description_has_course';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }
}
