<?php

namespace App\Http\Controllers;

use App\Models\DigitalToolsHasStudent;
use Illuminate\Http\Request;

class DigitalToolsStudentController extends ModelController
{

    public function __construct() {
        $this->object = new DigitalToolsHasStudent();
        $this->objectName = 'digital_tools_student';
        $this->objectNames = 'digital_tools_students';
        $this->relactionships = [];
    }

}