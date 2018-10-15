<?php

namespace App\Http\Controllers;

use App\Models\FeedbackTypeAssignmentSubmission;
use Illuminate\Http\Request;

class FeedbackTypeAssignmentSubmissionController extends ModelController
{

    public function __construct() {
        $this->object = new FeedbackTypeAssignmentSubmission();
        $this->objectName = 'feedback_type_assignment_submission';
        $this->objectNames = 'feedback_type_assignment_submissions';
        $this->relactionships = [];
    }

}