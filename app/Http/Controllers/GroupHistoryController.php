<?php

namespace App\Http\Controllers;

use App\Models\GroupHistory;
use Illuminate\Http\Request;

class GroupHistoryController extends ModelController
{

    public function __construct() {
        $this->object = new GroupHistory();
        $this->objectName = 'group_history';
        $this->objectNames = 'group_history';
        $this->relactionships = [];
    }
   
}
