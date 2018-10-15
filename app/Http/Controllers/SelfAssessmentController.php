<?php

namespace App\Http\Controllers;

use App\Models\SelfAssessment;
use Illuminate\Http\Request;

class SelfAssessmentController extends ModelController
{

    public function __construct() {
        $this->object = new SelfAssessment();
        $this->objectName = 'self_assessment';
        $this->objectNames = 'self_assessments';
        $this->relactionships = [];
    }

}