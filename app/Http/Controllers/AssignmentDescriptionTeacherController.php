<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescriptionsHasTeacher;
use Illuminate\Http\Request;

class AssignmentDescriptionTeacherController  extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentDescriptionsHasTeacher();
        $this->objectName = 'assignment_description_teacher';
        $this->objectNames = 'assignment_description_teacher';
        $this->relactionships = [];
    }

}