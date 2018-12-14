<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementsController extends ModelController
{    
    public function __construct() {
        $this->object = new Announcement();
        $this->objectName = 'announcement';
        $this->objectNames = 'announcements';
        $this->relactionships = [];
    }

    
}
