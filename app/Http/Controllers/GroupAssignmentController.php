<?php

namespace App\Http\Controllers;

use App\Models\GroupAssignment;
use Illuminate\Http\Request;

class GroupAssignmentController extends ModelController
{

    public function __construct() {
        $this->object = new GroupAssignment();
        $this->objectName = 'group_assignment';
        $this->objectNames = 'group_assignments';
        $this->relactionships = [];
    }

}
