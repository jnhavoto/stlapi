<?php

namespace App\Http\Controllers;

use App\Models\WorkplaceToolsHasStudent;
use Illuminate\Http\Request;

class WorkplaceToolStudentController extends ModelController
{

    public function __construct() {
        $this->object = new WorkplaceToolsHasStudent();
        $this->objectName = 'workplace_tool_student';
        $this->objectNames = 'workplace_tool_students';
        $this->relactionships = [];
    }

}