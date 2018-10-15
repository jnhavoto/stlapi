<?php

namespace App\Http\Controllers;

use App\Models\GroupsAssignmentDescription;
use Illuminate\Http\Request;

class GroupsAssignmetDescriptionController extends  ModelController
{

    public function __construct() {
        $this->object = new GroupsAssignmentDescription();
        $this->objectName = 'groups_assignmet_description';
        $this->objectNames = 'groups_assignmet_descriptions';
        $this->relactionships = [];
    }

}