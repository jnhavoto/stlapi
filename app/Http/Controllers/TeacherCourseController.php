<?php

namespace App\Http\Controllers;

use App\Models\TeacherCourse;
use Illuminate\Http\Request;

class TeacherCourseController extends ModelController
{

    public function __construct() {
        $this->object = new TeacherCourse();
        $this->objectName = 'teacher_course';
        $this->objectNames = 'teacher_courses';
        $this->relactionships = [];
    }

}