<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends ModelController
{

    public function __construct() {
        $this->object = new Subject();
        $this->objectName = 'subject';
        $this->objectNames = 'subjects';
        $this->relactionships = [];
    }


}
