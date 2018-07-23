<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentSubmission;
use App\Models\AssignmentTemplate;
use App\Models\Course;
use App\Models\CoursesTemplate;
use App\Models\Department;
use App\Models\Feedback;
use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends ModelController
{

    public function __construct()
    {
        $this->object = new Teacher();
        $this->objectName = 'teacher';
        $this->objectNames = 'teachers';
        $this->relactionships = [];
    }

    public function listContacts()
    {
        $teachers = Teacher::with('user')->get();

        $students = Student::with('user')->get();

        return view('communications.contacts', ['teachers' => $teachers, 'students' => $students, 'user' => Auth::user()]);
    }

    public function getCourses()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        $teacherCourses = $teacher->courses;
//return $teacherCourses;
        $coursesTemplates = CoursesTemplate::all();

        return view('activities.course',
            ['courseTemplates' => $coursesTemplates,
                'teacherCourses'=>$teacherCourses,
                'teachers' => $teachers,
                'user' => Auth::user()]);
    }

    public function getAllAssignments(){
        //get all existing assignments
        $assignments = AssignmentDescription::all();
        //get all existing teachers
        $teachers = Teacher::all();
        //pass values to the view
        return view('activities.assignment',['assignments' => $assignments, 'teachers'=>$teachers, 'user' =>
            Auth::user()]);
    }

    //get all assignments and teacher assignments
    public function getAssignments()
    {
        //first get all assignments
        $assTemplates = AssignmentTemplate::all();
        //all courses
//        $courses = Course::all();
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        //getting the ist of members where the teacher is part of
        $teachers_members = TeacherMember::Where('teachers_id', $teacher->id)->get();
        $assignmentTeacher = AssignmentDescriptionsHasTeacher::Where('teachers_id',$teacher->id)->get();
        $teacher_assignments = collect();
        //getting teacher courses
        $teacherCourses = $teacher->courses;
//        return $teachers_members[0];
//

        for ($j = 0; $j < count($teachers_members); $j++) {

            $list = $teachers_members[$j]->group_teacher->assignment_descriptions;
            for ($i = 0; $i < count($list); $i++) {
                $teacher_assignments->push($list[$i]);
//                return $assignments;
            }
        }

//        return ($teacher_assignments);

//        return $courses;
        return view('activities.assignment',
            ['assTemplates' => $assTemplates,
            'teacher_assignments' => $teacher_assignments,
            'teachers' => $teachers,
            'teacherCourses' => $teacherCourses,
            'user' => Auth::user
    ()]);
    }

    public function getAllAssignmentSubmissions()
    {
//        $student = Student::Where('students_id', $teacher->id)->get();
        $assignSubmissions = AssignmentSubmission::all();
//        return $assignSubmissions;
        return view('activities.assignment-submissions',['assSubmissions' => $assignSubmissions,
        'user' => Auth::user()]);
    }

    public function submitAssignment2(Request $request)
    {
//        return $request;
        $assignment = new AssignmentDescription();
        $assignment->case = $request->case;
        $assignment->instructions = $request->instructions;
        $assignment->startdate = $request->startdate;
        $assignment->deadline = $request->deadline;
        $assignment->available_date = $request->available_date;
        return $assignment;

    }

    public function submitAssignment(Request $request)
    {
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        $group_teacher = GroupTeacher::create(
            [
                'group_name' => 'Default Name',
            ]
        );


        if (!$group_teacher) {
            DB::rollBack();
            return ['Error when save GroupTeacher'];
        } else {

            $teacher_member = TeacherMember::create(
                [
                    'teachers_id' => $teacher->id,
                    'group_teachers_id' => $group_teacher->id,
                ]
            );

            $assigment = AssignmentDescription::create(
                [
                    'case' => $request->case,
                    'number' => $request->number,
                    'instructions' => $request->instructions,
                    'startdate' => $request->startdate,
                    'deadline' => $request->deadline,
                    'available_date' => $request->availabledate,
                    'group_teachers_id' => $group_teacher->id,
                    'courses_id' => $request->course_id,
                    //cousees_id is selectable
                ]
            );

            $teacher1 = Teacher::Where('users_id', Auth::user()->id)->first();

            $assignHasTeacher = AssignmentDescriptionsHasTeacher::create(
                [
                    'assignment_descriptions_id' => $assigment->id,
                    'teachers_id' => $teacher1->id,
                ]
            );

        }

        if ($assigment and $teacher_member and $assignHasTeacher) {
            DB::commit();
            return redirect('/assignments');
        } else {
            DB::rollBack();
            return "Error when save Assignment Description or Teacher Member";
        }
    }

    public function submitCourse(Request $request){
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        //get the department name from the user
        $department = Department::Where('name',$request->name);
        //create the course with content from the form
        $course = Course::create(
            [
                'name' => $request->name,
                'course_content' => $request->course_content,
                'startdate' => $request->startdate,
                //get the department id from the name the user chose in the form
                'departments_id' => 1,
            ]
        );
        //associate the course with the teacher
        $teacher_course = TeacherCourse::create(
            [
                'teachers_id' => $teacher->id,
                'courses_id' => $course->id,
            ]
        );
        //enrol all student on this course
        $students = Student::all();
        foreach ($students as $student)
        {
            $student_course = StudentsCourse::create(
                [
                    'students_id' => $student->id,
                    'courses_id' => $course->id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => 0,
                ]
            );
        }
        //createing group_teacher
        $group_teacher = GroupTeacher::create(
            [
                'group_name' => 'Default Name',
            ]
        );
        //adding instructors to the course
        $instructors = $request->instructors;


//return $request->instructors[1];

//        return ($test);

//        for ($i=0; $i< sizeof($instrutors); $i++)
        foreach ($instructors as $instructor)

        {
            $teacher_member = TeacherMember::create(
                [
                    'group_teachers_id' => $group_teacher->id,
                    'teachers_id' => $instructor,
//                    'teachers_id' => $instrutors[$i],
                ]
            );
        }

        if (!$teacher_member){
            return "Qualquer coisa";
        }else

        //check if course and tecaher_course have any error: if not, then write on the DB
        if ($course and $teacher_course and $student_course) {
            DB::commit();
            return redirect('/courses');
        }
    }

    public function getAllFeedbacks()
    {
        $feedbacks = Feedback::all();
        return view('activities.feedbacks',['feedbacks' => $feedbacks,
            'user' => Auth::user()]);
    }



}