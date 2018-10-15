<?php

namespace App\Http\Controllers;

use App\Models\TechUseHasStudent;
use Illuminate\Http\Request;

class TechUseStudentController extends ModelController
{

    public function __construct() {
        $this->object = new TechUseHasStudent();
        $this->objectName = 'tech_use_student';
        $this->objectNames = 'tech_use_students';
        $this->relactionships = [];
    }

}