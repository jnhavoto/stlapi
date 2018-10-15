<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends ModelController
{

    public function __construct() {
        $this->object = new Question();
        $this->objectName = 'question';
        $this->objectNames = 'questions';
        $this->relactionships = [];
    }

}