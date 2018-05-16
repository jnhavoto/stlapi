<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends ModelController
{

    public function __construct() {
        $this->object = new Student();
        $this->objectName = 'student';
        $this->objectNames = 'students';
        $this->relactionships = [];
    }

    public function getAssignmentDesc(){
//        $assigDesc= AssignmentDescription::where
    }

}