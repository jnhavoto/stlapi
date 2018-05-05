<?php

namespace App\Http\Controllers;

use App\Models\SubjectsHasStudent;
use Illuminate\Http\Request;

class SubjectStudentController extends ModelController
{

    public function __construct() {
        $this->object = new SubjectsHasStudent();
        $this->objectName = 'subject_student';
        $this->objectNames = 'subject_students';
        $this->relactionships = [];
    }

}