<?php

namespace App\Http\Controllers;

use App\Models\AnnouncementsHasStudent;
use App\Models\AnnouncementsHasTeacher;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends ModelController
{
    public function __construct()
    {
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
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id', $teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id', $teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach ($assign_teacher as $assignteacher) {
            $announc = Announcement::where('assignment_description_id', $assignteacher->assignment_descriptions_id)->get();
            $teacher_announc->push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getAnnouncementDetails(Request $id)
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
        //get the list of memberships of the actual teacher
        $memberof = TeacherMember::where('teachers_id', '<>', $teacherid->id)->get();
        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();
        //return $memberof;

        foreach ($memberof as $membership) {
            $announcementasmember = AssignmentAnnouncement::with('teacher_member')
                ->where('teacher_members_id', $membership->id)
                ->where('id', $id->id)
                ->where('assignment_descriptions_id', '<>', ' ')
                ->get();

            $course_announcementasmember = CourseAnnouncement::with('teacher_member')
                ->where('teacher_members_id', $membership->id)
                ->where('id', $id->id)
                ->get();

            if (count($announcementasmember) > 0) {
                $inbox_announcements->push($announcementasmember);
            }
            if (count($course_announcementasmember) > 0) {
                $inbox_announcements->push($course_announcementasmember);
            }
        }
        return $inbox_announcements;
        return view('communications.announcement-details', [
                'announcementDetails' => $announcementDetails,
                'label' => 'inbox',
                'count_inbox' => $this->count_announcements('inbox'),
                'count_sent' => $this->count_announcements('sent'),
                'count_draft' => $this->count_announcements('draft'),
                'user' => Auth::user()]
        );
    }

    public function getInboxAnnouncements()
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        //List this teacher assign announcements
        $inbox_announcements = AnnouncementsHasTeacher::with('announcement')->where('teachers_id', '<>', $teacherid->id)->where('status', 1)->get();
        //List this teacher course announcements
//        $courseAnnounces = CourseAnnouncement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
        //list

//        $inbox_announcements = collect();

//        if(count($assignAnnounces)!=0)
//            $inbox_announcements->push($assignAnnounces);
//        if(count($courseAnnounces)!=0)
//            $inbox_announcements->push($courseAnnounces);

//        return $inbox_announcements;
        return view('communications.inbox', ['inbox_announcements' => $inbox_announcements, 'label' => 'inbox', 'count_inbox'
        => $this->count_announcements('inbox'), 'count_sent' => $this->count_announcements('sent'), 'count_draft' => $this->count_announcements('draft'),
            'user' => Auth::user()]);
    }

//    public function getSentAnnouncements(){
//        //get teacher id
//        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
//
//        //List this teacher assign announcements
//        $assignAnnounces = AssignmentAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
//        //List this teacher course announcements
//        $courseAnnounces = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
//        //list
//
//
//        //get all announcements where the teacher/instructor is a mmember
//        $sent_announcements = collect();
//
//        if(count($assignAnnounces)!=0)
//            $sent_announcements->push($assignAnnounces);
//        if(count($courseAnnounces)!=0)
//            $sent_announcements->push($courseAnnounces);
//
////        return $sent_announcements;
//
//        return view('communications.sent', ['sent_announcements' => $sent_announcements, 'label' => 'sent', 'count_inbox'
//        => $this->count_announcements('inbox'),'count_sent' => $this->count_announcements('sent'),'count_draft' => $this->count_announcements('draft'),
//            'user'=>Auth::user()]);
//        //testing output
//        // return $sent_announcements;
//    }

    public function getDraftAnnouncements()
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        //List this teacher assign announcements
        $draft_announcements = AnnouncementsHasTeacher::with('announcemnt')->where('teachers_id', $teacherid->id)->where('status', 0)->get();
        //List this teacher course announcements
//        $courseAnnounces = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 0)->get();
        //list
        //get all announcements where the teacher/instructor is a mmember
//        $draft_announcements = collect();
//
//        if(count($assignAnnounces)!=0)
//            $draft_announcements->push($assignAnnounces);
//        if(count($courseAnnounces)!=0)
//            $draft_announcements->push($courseAnnounces);

        return view('communications.draft', ['draft_announcements' => $draft_announcements, 'label' => 'draft', 'count_inbox'
        => $this->count_announcements('inbox'), 'count_sent' => $this->count_announcements('sent'), 'count_draft' => $this->count_announcements('draft'),
            'user' => Auth::user()]);

    }

    public function getAnnouncementsOutbox()
    {
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id', $teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id', $teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach ($assign_teacher as $assignteacher) {
            $announc = Announcement::where('assignment_description_id', $assignteacher->assignment_descriptions_id)->where('status', 2)->get();
            $teacher_announc->push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getAnnouncementsDraft()
    {
        //get the details of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

        //get all teacher's assignment descriptions
        $assign_teacher = AssignmentDescriptionsHasTeacher::where('teachers_id', $teacher->id)->get();

        //get all teacher courses
        $course_teacher = TeacherCourse::where('teachers_id', $teacher->id)->get();

        //create na empty list of teacher announcments
        $teacher_announc = collect();

        foreach ($assign_teacher as $assignteacher) {
            $announc = Announcement::where('assignment_description_id', $assignteacher->assignment_descriptions_id)->where('status', 0)->get();
            $teacher_announc->push($announc);
        }
        return $teacher_announc;
        return view('communications.announcements',
            ['announcements' => $announces,
                'user' => Auth::user
                ()]);

    }

    public function getSentAnnouncements()
    {
        //get teacher id
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();
//        return $teacherid;

        //List this teacher assign announcements
        $announcements = AnnouncementsHasTeacher::with('announcement')
            ->with('teacher')
            ->where('teachers_id', $teacherid->id)
            ->where('status', 2)->get();
//        return $announcements;
        //List this teacher course announcements
//        $courseAnnounces = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
        //list

//
//        //get all announcements where the teacher/instructor is a mmember
//        $sent_announcements = collect();
//
//        if(count($assignAnnounces)!=0)
//            $sent_announcements->push($assignAnnounces);
//        if(count($courseAnnounces)!=0)
//            $sent_announcements->push($courseAnnounces);

//        return $sent_announcements;

        return view('communications.sent', ['sent_announcements' => $announcements,
            'label' => 'sent', 'count_inbox'
            => $this->count_announcements('inbox'), 'count_sent' => $this->count_announcements('sent'), 'count_draft' => $this->count_announcements('draft'),
            'user' => Auth::user()]);
        //testing output
        // return $sent_announcements;
    }

    public function count_announcements($type)
    {
        $teacherid = Teacher::where('users_id', Auth::user()->id)->first();

        $count_annouc = 0;

        if ($type == 'inbox') {
            $announcements = AnnouncementsHasTeacher::where('teachers_id', '<>', $teacherid->id)->where('status', 1)->get();
//                    $course_announcementasmember = Announcement::where('teachers_id','<>',$teacherid->id)->where('status', 1)->get();
        } elseif ($type == 'sent') {
            $announcements = AnnouncementsHasTeacher::where('teachers_id', $teacherid->id)->where('status', 2)->get();
//                    return $announcements;
//                    $course_announcementasmember = CourseAnnouncement::where('teachers_id',$teacherid->id)->where('status', 1)->get();
        } elseif ($type == 'draft') {
            $announcements = AnnouncementsHasTeacher::where('teachers_id', $teacherid->id)->where('status', 0)->get();
//                    $course_announcementasmember = CourseAnnouncement::where('teachers_id',$teacherid->id)
//                        ->where('status', 0)->get();
        }

        if (count($announcements) > 0) {
            $count_annouc += count($announcements);
        }

        return $count_annouc;

    }

    public function getAnnouncementByAssignId($id)
    {
        $assignment_announcements = Announcement::where('assignment_description_id', $id)->get();
        return ['announcements-for-assignment' => $assignment_announcements];
    }

    public function sendAnnouncemntByTeacher(Request $request)
    {
//        return $request;
        $teacher = Teacher::where('users_id', Auth::user()->id)->first();
        $courseInstructors = TeacherCourse::where('courses_id', $request->course_id)->get();

        if ($request->assignment_id != 0)
        {
            $announcement = Announcement::create(
                [
                    'assignment_description_id' => $request->assignment_id,
                    'message' => $request->message,
                    'subject' => $request->subject,
                    'status' => 2,
                    'sender' => $teacher->id,
                ]
            );
//                    return $announcement;
            //getting other instructor members of the same announcement
            $instructors = AssignmentDescriptionsHasTeacher::where('assignment_descriptions_id', $request->assignment_id)->get();
            if (count($instructors) > 1) {
                foreach ($instructors as $instructor) {
                    if ($instructor->teachers_id != $teacher->id) {
                        AnnouncementsHasTeacher::create(
                            [
                                'announcements_idannouncement' => $announcement->id,
                                'teachers_id' => $instructor->teachers_id,
                                'status' => 2,
                            ]
                        );
                    }
                }
            }
            //create announcement for each student/participant
            $participants = Student::all();
            foreach ($participants as $participant)
            {
                AnnouncementsHasStudent::create(
                    [
                        'announcements_id' => $announcement->id,
                        'students_id' => $participant->id,
                        'status' => 0,
                    ]
                );
            }
        } elseif ($request->course_id != 0) {
            $course = Announcement::create(
                [
                    'courses_id' => $request->course_id,
                    'message' => $request->message,
                    'subject' => $request->subject,
                    'sender' => $teacher->id,
                    'status' => 2,
                ]
            );


            $instructors = TeacherCourse::where('courses_id', $request->course_id)->get();
            if (count($instructors) > 1) {
                foreach ($instructors as $instructor) {
                    if ($instructor->teachers_id != $teacher->id) {
                        AnnouncementsHasTeacher::create(
                            [
                                'announcements_idannouncement' => $course->id,
                                'teachers_id' => $instructor->teachers_id,
                                'status' => 0,
                            ]
                        );
                    }
                }
            }
            //create announcement for each student/participant
            $participants = Student::all();
            foreach ($participants as $participant)
            {
                AnnouncementsHasStudent::create(
                    [
                        'announcements_id' => $course->id,
                        'students_id' => $participant->id,
                        'status' => 0,
                    ]
                );
            }
        }
        return redirect('/announcements/sent');
    }

    public function composeAnnouncements()
    {
        //get teacher id
        $teacher = Teacher::where('users_id', Auth::user()->id)->first();

        //get all announcements where the teacher/instructor is a mmember
        $inbox_announcements = collect();

        //get all teachers courses
        $courseToAnnounce = TeacherCourse::with('course')->where('teachers_id', $teacher->id)->get();
        //get all teachers' assignments
        $assignToAnnounce = AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
            $teacher->id)->get();
//        return $assignToAnnounce;

        $draft_announcements = collect();

        return view('communications.compose-announcement', ['draft_announcements' => $draft_announcements, 'label' =>
            'draft', 'count_inbox'
        => $this->count_announcements('inbox'), 'count_sent' => $this->count_announcements('sent'), 'count_draft' => $this->count_announcements('draft'),
            'courseToAnnounce' => $courseToAnnounce,
            'assignToAnnounce' => $assignToAnnounce,
            'user' => Auth::user()]);

    }

}
