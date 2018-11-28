<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescriptionHasStudent;
use Illuminate\Http\Request;

class AssignmenntDescriptionHasStudentController extends ModelController
{
    public function __construct() {
        $this->object = new AssignmentDescriptionHasStudent();
        $this->objectName = 'assignmentdescription_has_student';
        $this->objectNames = 'assignmentdescription_has_students';
        $this->relactionships = [];
    }
}
