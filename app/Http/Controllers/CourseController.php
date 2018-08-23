<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentSubmission;
use App\Models\Course;

use App\Models\CoursesTemplate;
use App\Models\Department;
use App\Models\GroupTeacher;
use App\Models\Student;
use App\Models\StudentsCourse;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends  ModelController
{

    public function __construct() {
        $this->object = new Course();
        $this->objectName = 'course';
        $this->objectNames = 'courses';
        $this->relactionships = [];
    }

    public function getAllCourses()
    {
        $courses = Course::with('user')->get();
        return view('activities.course',['courses'=>$courses,'user' => Auth::user()]);
    }

    public function getCourses()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        $teacherCourses = $teacher->courses;
        $teacherMembers = TeacherMember::where('teachers_id',$teacher->id)->get();
        $allTeacherMembers = Collect();
        foreach ($teacherMembers as $member)
        {
            $teacher = TeacherMember::where('group_teachers_id',$member->group_teachers_id)->get();
//            $teacher = GroupTeacher::where('id',$member->group_teachers_id)->teachers;
            $allTeacherMembers->push($teacher);
        }

//        return $allTeacherMembers;
        $coursesTemplates = CoursesTemplate::all();

//        return $teacherMembers;
        return view('design.course',
            ['courseTemplates' => $coursesTemplates,
                'teacherCourses'=>$teacherCourses,
                'teachers' => $teachers,
                'user' => Auth::user()]);
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
                'available_date' => $request->available_date,
                //get the department id from the name the user chose in the form
                'departments_id' => 1,
            ]
        );
        //return $request->course_content;
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

        $teacher_member = TeacherMember::create(
            [
                'group_teachers_id' => $group_teacher->id,
                'teachers_id' => $teacher->id,
//                    'teachers_id' => $instrutors[$i],
            ]
        );

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
            $teacher_course = TeacherCourse::create(
                [
                    'teachers_id' => $instructor,
                    'courses_id' => $course->id,
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

    public function courseOverview(Request $request)
    {
        //get course details
        $course = Course::where('id', $request->id)->get();
        //get all assignments of this course
        $courseAssignemts = AssignmentDescription::where('courses_id',$request->id)->get();
//        get all submitted assignments of this course
        $submissions = collect();

        foreach ($courseAssignemts as $assignment )
        {
            $submission = AssignmentSubmission::where('assignment_descriptions_id',$assignment->id)->get();
//            $submission = AssignmentSubmission::where('assignment_descriptions_id',5)->get();
            $submissions ->push($submission);
        }
//        return $submissions;

        //get all students
        return view('monitoring.course-overview', ['course' => $course, 'courseAssignments' => $courseAssignemts,
            'submissions' => $submissions,
            'user'=>Auth::user()]);

    }

    public function updateCourse(Request $request, $id=0){
        //get teacher ID: who logged in
        //$id = $request->input("id");
        //$teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();
//        $course = Course::find($id);
        return $request->id;
        //get the department name from the user
//        $department = Department::Where('name',$values->name);
        //create the course with content from the form
//        $course = Course::update(
//            [
//                'name' => $values->name,
//                'course_content' => $values->course_content,
//                'startdate' => $values->startdate,
//                'available_date' => $values->available_date,
//                //get the department id from the name the user chose in the form
//                'departments_id' => 1,
//            ]
//        );

//        $course->name = $values->name;
//        $course->course_content = $values->course_content;
//        $course->startdate = $values->startdate;
//        $course->available_date = $values->available_date;
//        $course->save();

//        $course->update($request->all());
        //return $request->course_content;
        //associate the course with the teacher
//        $teacher_course = TeacherCourse::create(
//            [
//                'teachers_id' => $teacher->id,
//                'courses_id' => $course->id,
//            ]
//        );
//        //enrol all student on this course
//        $students = Student::all();
//        foreach ($students as $student)
//        {
//            $student_course = StudentsCourse::create(
//                [
//                    'students_id' => $student->id,
//                    'courses_id' => $course->id,
//                    'start_date' => $values->start_date,
//                    'end_date' => $values->end_date,
//                    'status' => 0,
//                ]
//            );
//        }
//        //createing group_teacher
//        $group_teacher = GroupTeacher::create(
//            [
//                'group_name' => 'Default Name',
//            ]
//        );
//        //adding instructors to the course
//        $instructors = $values->instructors;
//
//
////return $request->instructors[1];
//
////        return ($test);
//
////        for ($i=0; $i< sizeof($instrutors); $i++)
//        foreach ($instructors as $instructor)
//
//        {
//            $teacher_member = TeacherMember::create(
//                [
//                    'group_teachers_id' => $group_teacher->id,
//                    'teachers_id' => $instructor,
////                    'teachers_id' => $instrutors[$i],
//                ]
//            );
//        }
//
//        if (!$teacher_member){
//            return "Qualquer coisa";
//        }else
//
//            //check if course and tecaher_course have any error: if not, then write on the DB
//            if ($course and $teacher_course and $student_course) {
//                DB::commit();
//                return redirect('/courses');
//            }
    }

    public function courseDesignOverview(Request $request)
    {
        //get course details
        $course = Course::where('id', $request->id)->get();
        //get all assignments of this course
        $courseAssignemts = AssignmentDescription::where('courses_id',$request->id)->get();
//        get all submitted assignments of this course
        $submissions = collect();

        foreach ($courseAssignemts as $assignment )
        {
            $submission = AssignmentSubmission::where('assignment_descriptions_id',$assignment->id)->get();
//            $submission = AssignmentSubmission::where('assignment_descriptions_id',5)->get();
            $submissions ->push($submission);
        }
//        return $submissions;

        //get all students
        return view('monitoring.course-overview', ['course' => $course, 'courseAssignments' => $courseAssignemts,
            'submissions' => $submissions,
            'user'=>Auth::user()]);

    }

    public function coursesOverview()
    {
        //get all teacher courses
        //get all teacher assignments
        return view('monitoring.courses-overview',
            [
//                'courses' => $courses, 'courseAssignments' => $courseAssignemts,
//            'submissions' => $submissions,
            'user'=>Auth::user()]);
    }
}