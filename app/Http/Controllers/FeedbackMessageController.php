<?php

namespace App\Http\Controllers;

use App\Models\FeedbackMessage;
use Illuminate\Http\Request;

class FeedbackMessageController extends ModelController
{

    public function __construct() {
        $this->object = new FeedbackMessage();
        $this->objectName = 'feedback_message';
        $this->objectNames = 'feedback_messages';
        $this->relactionships = [];
    }

}