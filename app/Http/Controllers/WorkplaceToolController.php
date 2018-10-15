<?php

namespace App\Http\Controllers;

use App\Models\WorkplaceTool;
use Illuminate\Http\Request;

class WorkplaceToolController extends ModelController
{

    public function __construct() {
        $this->object = new WorkplaceTool();
        $this->objectName = 'workplace_tool';
        $this->objectNames = 'workplace_tools';
        $this->relactionships = [];
    }

}