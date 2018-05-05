<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use Illuminate\Http\Request;

class AssignmentAnnouncementController  extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentAnnouncement();
        $this->objectName = 'assignment_annoucement';
        $this->objectNames = 'assignment_annoucements';
        $this->relactionships = [];
    }

}