<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementsHasTeacher;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends ModelController
{    
    public function __construct() {
        $this->object = new Announcement();
        $this->objectName = 'announcement';
        $this->objectNames = 'announcements';
        $this->relactionships = [];
    }

    public function getAnnouncements()
    {
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id',$teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id',$teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();
        
        foreach($assign_teacher as $assignteacher){
            $announc = Announcement::where('assignment_description_id',$assignteacher->assignment_descriptions_id)->get();
            $teacher_announc -> push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getAnnouncementsInbox(){
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id',$teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id',$teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach($assign_teacher as $assignteacher){
            $announc = Announcement::where('assignment_description_id',$assignteacher->assignment_descriptions_id)->where('status', 1)->get();
            $teacher_announc -> push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getAnnouncementsOutbox(){
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id',$teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id',$teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach($assign_teacher as $assignteacher){
            $announc = Announcement::where('assignment_description_id',$assignteacher->assignment_descriptions_id)->where('status', 2)->get();
            $teacher_announc -> push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getAnnouncementsDraft(){
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id',$teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id',$teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach($assign_teacher as $assignteacher){
            $announc = Announcement::where('assignment_description_id',$assignteacher->assignment_descriptions_id)->where('status', 0)->get();
            $teacher_announc -> push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

            }

}
