<?php

namespace App\Http\Controllers;

use App\Models\DigitalTool;
use Illuminate\Http\Request;

class DigitalToolController extends ModelController
{

    public function __construct() {
        $this->object = new DigitalTool();
        $this->objectName = 'digital_tool';
        $this->objectNames = 'digital_tools';
        $this->relactionships = [];
    }

}