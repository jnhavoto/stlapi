<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementsHasTeacher;
use Illuminate\Http\Request;

class AnnouncementsHasTeacherController extends ModelController
{
    public function __construct() {
        $this->object = new AnnouncementsHasTeacher();
        $this->objectName = 'announcement_has_teacher';
        $this->objectNames = 'announcement_has_teachers';
        $this->relactionships = [];
    }
}
