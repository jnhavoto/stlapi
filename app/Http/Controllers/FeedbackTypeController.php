<?php

namespace App\Http\Controllers;

use App\Models\FeedbackType;
use Illuminate\Http\Request;

class FeedbackTypeController extends ModelController
{

    public function __construct() {
        $this->object = new FeedbackType();
        $this->objectName = 'feedback_type';
        $this->objectNames = 'feedback_types';
        $this->relactionships = [];
    }

}