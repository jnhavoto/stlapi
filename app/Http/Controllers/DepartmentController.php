<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends ModelController
{

    public function __construct() {
        $this->object = new Department();
        $this->objectName = 'department';
        $this->objectNames = 'departments';
        $this->relactionships = [];
    }


}
