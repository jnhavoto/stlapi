<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmissionsMediaType;
use Illuminate\Http\Request;

class AssignmentSubmissionMediaTypeController  extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentSubmissionsMediaType();
        $this->objectName = 'assignment_submission_media_type';
        $this->objectNames = 'assignment_submission_media_type';
        $this->relactionships = [];
    }

}