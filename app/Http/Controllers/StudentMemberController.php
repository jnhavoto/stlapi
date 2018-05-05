<?php

namespace App\Http\Controllers;

use App\Models\StudentMember;
use Illuminate\Http\Request;

class StudentMemberController extends ModelController
{

    public function __construct() {
        $this->object = new StudentMember();
        $this->objectName = 'student_member';
        $this->objectNames = 'student_members';
        $this->relactionships = [];
    }

}