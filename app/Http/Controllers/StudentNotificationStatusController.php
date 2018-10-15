<?php

namespace App\Http\Controllers;

use App\Models\StudentAnnouncementsStatus;
use Illuminate\Http\Request;

class StudentNotificationStatusController extends ModelController
{

    public function __construct() {
        $this->object = new StudentAnnouncementsStatus();
        $this->objectName = 'student_notification_status';
        $this->objectNames = 'students_notifications_status';
        $this->relactionships = [];
    }

}