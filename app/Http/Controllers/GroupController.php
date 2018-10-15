<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends ModelController
{

    public function __construct() {
        $this->object = new Group();
        $this->objectName = 'group';
        $this->objectNames = 'groups';
        $this->relactionships = [];
    }

}