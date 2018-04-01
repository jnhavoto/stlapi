<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use Illuminate\Http\Request;

class AssignmentDescriptionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentDescription();
        $this->objectName = 'assignment_description';
        $this->objectNames = 'assignment_description';
        $this->relactionships = [];
    }


}
