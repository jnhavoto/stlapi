<?php

namespace App\Http\Controllers;

use App\Models\WorkMethod;
use Illuminate\Http\Request;

class WorkMethodController extends ModelController
{

    public function __construct() {
        $this->object = new WorkMethod();
        $this->objectName = 'work_method';
        $this->objectNames = 'work_methods';
        $this->relactionships = [];
    }

}