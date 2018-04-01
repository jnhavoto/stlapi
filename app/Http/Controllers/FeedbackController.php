<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends ModelController
{

    public function __construct() {
        $this->object = new Feedback();
        $this->objectName = 'feedback';
        $this->objectNames = 'feedbacks';
        $this->relactionships = [];
    }

}
