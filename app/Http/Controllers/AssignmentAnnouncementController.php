<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use App\Models\Teacher;
use App\Models\TeacherMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentAnnouncementController  extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentAnnouncement();
        $this->objectName = 'assignment_annoucement';
        $this->objectNames = 'assignment_annoucements';
        $this->relactionships = [];
    }

    public function getAnnouncements()
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
        //get all memberships of the current instructor
        $memberof = TeacherMember::where('teachers_id', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
         $announcements = collect();

        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::where('teacher_members_id', $membership->id)->get();
            $assignment_extended = TeacherMember::where('teachers_id', $teacherid->id)->get()
            ->union($announcementasmember);
            return $assignment_extended;
            $announcements ->push($announcementasmember);
        }

        //$teachermembers = $memberof->teacher;
        $announcementsDetails = $announcements->merge($memberof);
        //testing the collection
        //return $announcementsDetails;

        return view('communications.announcements', ['announcements' => $announcements,
        'user'=>Auth::user()]);


    }

}