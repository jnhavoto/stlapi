<?php

namespace App\Http\Controllers;

use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialController extends ModelController
{
    public function __construct() {
        $this->object = new CourseMaterial();
        $this->objectName = 'course_material';
        $this->objectNames = 'course_material';
        $this->relactionships = [];
    }
}
