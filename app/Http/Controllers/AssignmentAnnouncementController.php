<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\CourseAnnouncement;
use App\Models\Teacher;
use App\Models\TeacherCourse;
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

        $othermembers = TeacherMember::where('teachers_id','<>', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
         $announcements = collect();
         $other_announcements = collect();

//        return $memberof;

        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
                $membership->id)
                ->get();
            $other_announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teachers_id',
                $membership->id)
                ->get();
//            $assignment_extended = TeacherMember::where('teachers_id', $teacherid->id)
//            ->join('assignment_announcement','teacher_members.id','=','assignment_announcement.teacher_members_id')
//            ->join('teachers', 'teacher_members.teachers_id', '=', 'teachers.id')
//            ->get();

            $announcements ->push($announcementasmember);
            $other_announcements ->push($other_announcementasmember);
        }
        /* return $announcements; */

        return view('communications.announcements', ['announcements' => $announcements, 'other_announcements' =>
            $other_announcements,
        'user'=>Auth::user()]);
    }

    public function getAnnouncementDetails(Request $id)
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
        //get the list of memberships of the actual teacher
        $memberof = TeacherMember::where('teachers_id','<>', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();
        //return $memberof;
        
        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')
                ->where('teacher_members_id', $membership->id)
                ->where('id', $id->id)
                ->where('assignment_descriptions_id','<>',' ')
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')
                ->where('teachers_id',$membership->id)
                ->where('id', $id->id)
                ->get();

            if(count($announcementasmember) > 0){
                $inbox_announcements ->push($announcementasmember);
            }
            if(count($course_announcementasmember) > 0){
                $inbox_announcements ->push($course_announcementasmember);
            }
        }        
        return $inbox_announcements;
        return view('communications.announcement-details', [
            'announcementDetails' => $announcementDetails,
            'label' => 'inbox', 
            'count_inbox' => $this->count_announcements('inbox'),
            'count_sent' => $this->count_announcements('sent'),
            'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]
        );
    }

    public function getInboxAnnouncements(){
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        $memberof = TeacherMember::where('teachers_id','<>', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();
        //return $memberof;
        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
                $membership->id)
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')->where('teachers_id',
                $membership->id)
                ->get();

            if(count($announcementasmember) > 0){
                $inbox_announcements ->push($announcementasmember);
            }
            if(count($course_announcementasmember) > 0){
                $inbox_announcements ->push($course_announcementasmember);
            }
        }
        return $inbox_announcements;

        return view('communications.inbox', ['inbox_announcements' => $inbox_announcements, 'label' => 'inbox', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);
    }

    public function getSentAnnouncements(){
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
        //get all memberships of the current instructor
        $memberof = TeacherMember::where('teachers_id', $teacherid->id)->get();

        //get all announcements where the teacher/instructor is a mmember
        $sent_announcements = collect();

        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
                $membership->id)
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')->where('teachers_id',
                $membership->id)
                ->get();

            if(count($announcementasmember) > 0){
                $sent_announcements ->push($announcementasmember);
            }
            if(count($course_announcementasmember) > 0){
                $sent_announcements ->push($course_announcementasmember);
            }

        }
//        return $sent_announcements;

        return view('communications.sent', ['sent_announcements' => $sent_announcements, 'label' => 'sent', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);

    }

    public function getDraftAnnouncements(){
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();


        $memberof = TeacherMember::where('teachers_id','<>', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();

        $draft_announcements = collect();
//        return $memberof;
        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
                $membership->id)
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')->where('teachers_id',
                $membership->id)
                ->get();

            if(count($announcementasmember) > 0){
                $draft_announcements ->push($announcementasmember);
            }
            if(count($course_announcementasmember) > 0){
                $draft_announcements ->push($course_announcementasmember);
            }
        }

        return view('communications.draft', ['draft_announcements' => $draft_announcements, 'label' => 'draft', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);

    }

    public function count_announcements($type){
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        $count_annouc = 0;

        if($type == 'inbox')
            $memberof = TeacherMember::where('teachers_id','<>', $teacherid->id)->get();
        elseif ($type == 'sent')
            $memberof = TeacherMember::where('teachers_id', $teacherid->id)->get();
        elseif ($type == 'draft')
            $memberof = TeacherMember::where('teachers_id', $teacherid->id)->get();

        //get all announcements where the teacher/instructor is a mmember

//        return $memberof;
        foreach ($memberof as $membership)
        {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
                $membership->id)
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')->where('teachers_id',
                $membership->id)
                ->get();

            if(count($announcementasmember) > 0 || count($course_announcementasmember) > 0){
                $count_annouc += count($announcementasmember)+count($course_announcementasmember);
            }
        }

        return $count_annouc;

    }

    public function composeAnnouncements(){
        //get teacher id
        $teacher = Teacher::where('users_id', Auth::user()->id)->first();

        $memberof = TeacherMember::where('teachers_id','<>', $teacher->id)->get();
        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();

        //get all teachers courses
        $courseToAnnounce = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
        //get all teachers' assignments
        $assignToAnnounce = AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
            $teacher->id)->get();

        $draft_announcements = collect();

        return view('communications.compose-announcement', ['draft_announcements' => $draft_announcements, 'label' =>
            'draft', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'courseToAnnounce' => $courseToAnnounce,
            'assignToAnnounce' => $assignToAnnounce,
            'user'=>Auth::user()]);

    }

    public function submit_announcemnt(Request $request)
    {

        if($request->assignment_id != 0){

        }elseif ($request->course_id != 0){
            $announcemente = CourseAnnouncement::create(
                [

                ]
            );
        }




        return $request;

        return redirect('/announcements/inbox');
    }


}