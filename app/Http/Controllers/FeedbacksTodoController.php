<?php

namespace App\Http\Controllers;

use App\Models\FeedbacksTodo;
use Illuminate\Http\Request;

class FeedbacksTodoController extends ModelController
{
    public function __construct() {
        $this->object = new FeedbacksTodo();
        $this->objectName = 'feedbacktodo';
        $this->objectNames = 'feedbacktodos';
        $this->relactionships = [];
    }
}
