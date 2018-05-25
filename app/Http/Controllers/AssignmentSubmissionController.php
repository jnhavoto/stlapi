<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;

class AssignmentSubmissionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentSubmission();
        $this->objectName = 'assignment_submission';
        $this->objectNames = 'assignment_submissions';
        $this->relactionships = [];
    }


    public function store(Request $request){


        return $request->all();


    }



}