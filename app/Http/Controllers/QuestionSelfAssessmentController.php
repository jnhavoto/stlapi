<?php

namespace App\Http\Controllers;

use App\Models\QuestionsSelfAssessment;
use Illuminate\Http\Request;

class QuestionSelfAssessmentController extends ModelController
{

    public function __construct() {
        $this->object = new QuestionsSelfAssessment();
        $this->objectName = 'questions_self_assessment';
        $this->objectNames = 'questions_self_assessments';
        $this->relactionships = [];
    }

}