<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends ModelController
{

    public function __construct() {
        $this->object = new School();
        $this->objectName = 'school';
        $this->objectNames = 'schools';
        $this->relactionships = [];
    }

}
