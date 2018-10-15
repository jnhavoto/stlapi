<?php

namespace App\Http\Controllers;

use App\Models\TeacherMember;
use Illuminate\Http\Request;

class TeacherMemberController extends ModelController
{

    public function __construct() {
        $this->object = new TeacherMember();
        $this->objectName = 'teacher_member';
        $this->objectNames = 'teacher_members';
        $this->relactionships = [];
    }

}