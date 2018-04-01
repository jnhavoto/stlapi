<?php

namespace App\Http\Controllers;

use App\Models\RatingFeedback;
use Illuminate\Http\Request;

class RatingFeedbackController extends ModelController
{


    public function __construct() {
        $this->object = new RatingFeedback();
        $this->objectName = 'rating_feedback';
        $this->objectNames = 'rating_feedbacks';
        $this->relactionships = [];
    }

}
