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

    public function updateReadStatus(Request $request)
    {
      $courseannouncment = CourseAnnouncement::find($request->id);
      $courseannouncment->readstatus = 1;
      $courseannouncment->update();
      return response()->JSON(["updateStatus"=>200]);
    }

}
