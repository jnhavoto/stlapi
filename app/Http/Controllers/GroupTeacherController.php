<?php

namespace App\Http\Controllers;

use App\Models\GroupTeacher;
use Illuminate\Http\Request;

class GroupTeacherController extends ModelController
{

    public function __construct() {
        $this->object = new GroupTeacher();
        $this->objectName = 'group_teacher';
        $this->objectNames = 'group_teachers';
        $this->relactionships = [];
    }

}