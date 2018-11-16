<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAnnouncement;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\CourseAnnouncement;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
use Carbon\Carbon;
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
            $other_announcementasmember = AssignmentAnnouncement::with('teacher_member')->where('teacher_members_id',
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
                ->where('teacher_members_id',$membership->id)
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

        //List this teacher assign announcements
        $assignAnnounces = AssignmentAnnouncement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
        //List this teacher course announcements
        $courseAnnounces = CourseAnnouncement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
        //list

        $inbox_announcements = collect();

        if(count($assignAnnounces)!=0)
            $inbox_announcements->push($assignAnnounces);
        if(count($courseAnnounces)!=0)
            $inbox_announcements->push($courseAnnounces);

//        return $inbox_announcements;
        return view('communications.inbox', ['inbox_announcements' => $inbox_announcements, 'label' => 'inbox', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);
    }

    public function getSentAnnouncements(){
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        //List this teacher assign announcements
        $assignAnnounces = AssignmentAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
        //List this teacher course announcements
        $courseAnnounces = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
        //list


        //get all announcements where the teacher/instructor is a mmember
        $sent_announcements = collect();

        if(count($assignAnnounces)!=0)
            $sent_announcements->push($assignAnnounces);
        if(count($courseAnnounces)!=0)
            $sent_announcements->push($courseAnnounces);

//        return $sent_announcements;

        return view('communications.sent', ['sent_announcements' => $sent_announcements, 'label' => 'sent', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);
        //testing output
        // return $sent_announcements;
    }

    public function getDraftAnnouncements(){
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        //List this teacher assign announcements
        $assignAnnounces = AssignmentAnnouncement::where('teachers_id',$teacherid->id)->where('status', 0)->get();
        //List this teacher course announcements
        $courseAnnounces = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 0)->get();
        //list
        //get all announcements where the teacher/instructor is a mmember
        $draft_announcements = collect();

        if(count($assignAnnounces)!=0)
            $draft_announcements->push($assignAnnounces);
        if(count($courseAnnounces)!=0)
            $draft_announcements->push($courseAnnounces);

        return view('communications.draft', ['draft_announcements' => $draft_announcements, 'label' => 'draft', 'count_inbox'
        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
            'user'=>Auth::user()]);

    }

    public function count_announcements($type){
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        $count_annouc = 0;

                if($type == 'inbox'){
                    $announcementasmember = AssignmentAnnouncement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
                    $course_announcementasmember = CourseAnnouncement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
                }

                elseif ($type == 'sent'){
                    $announcementasmember = AssignmentAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
                    $course_announcementasmember = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
                }

                elseif ($type == 'draft'){
                    $announcementasmember = AssignmentAnnouncement::where('teachers_id',$teacherid->id)->where('status', 0)->get();
                    $course_announcementasmember = CourseAnnouncement::where('teachers_id',$teacherid->id)
                        ->where('status', 0)->get();
                }

            if(count($announcementasmember) > 0 || count($course_announcementasmember) > 0){
                $count_annouc += count($announcementasmember)+count($course_announcementasmember);
            }

        return $count_annouc;

    }

    public function composeAnnouncements(){
        //get teacher id
        $teacher = Teacher::where('users_id', Auth::user()->id)->first();

        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();

        //get all teachers courses
        $courseToAnnounce = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
        //get all teachers' assignments
        $assignToAnnounce = AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
            $teacher->id)->get();
//        return $assignToAnnounce;

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
//        return $request->all();
        $teacher = Teacher::where('users_id', Auth::user()->id)->first();

        $courseInstructors = TeacherCourse::where('courses_id',$request->course_id)->get();

        if($request->assignment_id != 0){
            AssignmentAnnouncement::create(
                [
                    'assignment_descriptions_id' => $request->assignment_id,
                    'message' => $request->message,
                    'subject' => $request->subject,
                    'status' => 1,
                    'teachers_id' => $teacher->id,
                    'teacher_members_id' => $teacher->id,
                ]
            );
        }
        elseif ($request->course_id != 0){
//            foreach ($courseInstructors as $instructor)
//            {
                CourseAnnouncement::create(
                    [
                        'courses_id' => $request->course_id,
                        'message' => $request->message,
                        'subject' => $request->subject,
                        'status' => 1,
                        'teachers_id' => $teacher->id,
                        'teacher_members_id' => $teacher->id,
                    ]
                );
//            }
        }

        // foreach ($request->all() as $chave => $valor){
        //     if(strpos($chave, 'file') !== false){
        //         Material::create([
        //             'course_announcements_id' => $request->course_id,
        //             'path' => $valor,
        //             'file_name' => explode('-a-', $valor)[1],
        //         ]);
        //     }
        // }

        return redirect('/announcements/sent');
    }

    public function saveFiles(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $filePath = collect();
            foreach ($file as $ficheiro){
                $filename = time() . '-a-' . $ficheiro->getClientOriginalName();
                $ficheiro->move('docs', $filename );
                $filePath->push('docs/' . '' . $filename );
            }

        } else {
            return response(['No files']);
        }

        return ['imagem' => $filePath];
    }

}
