<?php

namespace App\Http\Controllers;

use App\Models\WorkMethodsHasStudent;
use Illuminate\Http\Request;

class WorkMethodStudentController extends ModelController
{

    public function __construct() {
        $this->object = new WorkMethodsHasStudent();
        $this->objectName = 'work_method_student';
        $this->objectNames = 'work_method_students';
        $this->relactionships = [];
    }

}