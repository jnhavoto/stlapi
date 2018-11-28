<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementsHasStudent;
use Illuminate\Http\Request;

class AnnouncementsHasStudentController extends ModelController
{
    public function __construct() {
        $this->object = new AnnouncementsHasStudent();
        $this->objectName = 'announcement_has_student';
        $this->objectNames = 'announcement_has_students';
        $this->relactionships = [];
    }
}
