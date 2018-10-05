<?php

namespace App\Http\Controllers;

use App\Models\CourseAnnouncement;
use Illuminate\Http\Request;

class CourseAnnouncementController extends ModelController
{
    public function __construct() {
        $this->object = new CourseAnnouncement();
        $this->objectName = 'course_annoucement';
        $this->objectNames = 'course_annoucements';
        $this->relactionships = [];
    }


}
