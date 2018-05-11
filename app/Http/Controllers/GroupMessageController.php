<?php

namespace App\Http\Controllers;

use App\Models\GroupMessage;
use Illuminate\Http\Request;

class GroupMessageController extends ModelController
{

    public function __construct() {
        $this->object = new GroupMessage();
        $this->objectName = 'group_message';
        $this->objectNames = 'group_messages';
        $this->relactionships = ["student_member"];
    }



}