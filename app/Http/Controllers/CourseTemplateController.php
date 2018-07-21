<?php

namespace App\Http\Controllers;

use App\Models\CoursesTemplate;
use Illuminate\Http\Request;

class CourseTemplateController extends ModelController
{
    public function __construct() {
        $this->object = new CoursesTemplate();
        $this->objectName = 'course_template';
        $this->objectNames = 'course_template';
        $this->relactionships = [];
    }

}