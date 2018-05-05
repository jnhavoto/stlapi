<?php

namespace App\Http\Controllers;

use App\Models\StudentNotificationStatus;
use Illuminate\Http\Request;

class StudentNotificationStatusController extends ModelController
{

    public function __construct() {
        $this->object = new StudentNotificationStatus();
        $this->objectName = 'student_notification_status';
        $this->objectNames = 'students_notifications_status';
        $this->relactionships = [];
    }

}