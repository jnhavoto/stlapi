<?php

namespace App\Http\Controllers;

use App\Models\StudentsCourse;
use Illuminate\Http\Request;

class StudentsCourseController extends ModelController
{

    public function __construct() {
        $this->object = new StudentsCourse();
        $this->objectName = 'students_course';
        $this->objectNames = 'students_courses';
        $this->relactionships = [];
    }

}