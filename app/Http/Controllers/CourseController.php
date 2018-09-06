<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
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
use App\Models\CourseMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class CourseController extends ModelController
{

    public function __construct()
    {
        $this->object = new Course();
        $this->objectName = 'course';
        $this->objectNames = 'courses';
        $this->relactionships = [];
    }

    public function getAllCourses()
    {
        $courses = Course::with('user')->get();
        return view('activities.course', ['courses' => $courses, 'user' => Auth::user()]);
    }

    public function getCourses()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teachers = Teacher::all();
        $teacherCourses = TeacherCourse::with('course')->where('teachers_id', $teacher->id)->get();
        $coursesTemplates = CoursesTemplate::all();
//        return $teacherMembers;
        return view('design.course',
            ['coursesTemplates' => $coursesTemplates,
                'teacherCourses' => $teacherCourses,
                'teachers' => $teachers,
                'user' => Auth::user()]);
    }

    public function getInstructorsByCourseId($id)
    {
//        $courseIntructors = TeacherCourse::where('courses_id',$id)->get();
        $courseIntructors = TeacherCourse::with('teacher')->where('courses_id', $id)->get();


        $instructors = collect();

        foreach ($courseIntructors as $instructor) {
//            $instructors->push(Teacher::where('id', $instructor->teachers_id)->get());
            $instructors->push($instructor->teachers_id);
        }

        $response = Teacher::whereIn('id', $instructors)->get();

        return $response;
    }

    public function submitCourse(Request $request)
    {

        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        //get the department name from the user
        $department = Department::Where('name', $request->name);
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
        //enrol all student on this course
        $students = Student::all();
        foreach ($students as $student) {
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

        foreach ($instructors as $instructor) {
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

        if (!$teacher_member) {
            return "Qualquer coisa";
        } else

            //check if course and tecaher_course have any error: if not, then write on the DB
            if ($course and $teacher_course and $student_course) {
                DB::commit();

               if($request->submitNow == 0)
                    return redirect('/courses');
               else
                   return redirect('/update_course/'.$course->id);
            }
    }

    public function courseOverview(Request $request)
    {
        //get course details
        $course = Course::where('id', $request->id)->get();
        //get all assignments of this course
        $courseAssignemts = AssignmentDescription::where('courses_id', $request->id)->get();
//        get all submitted assignments of this course
        $submissions = collect();

        foreach ($courseAssignemts as $assignment) {
            $submission = AssignmentSubmission::where('assignment_descriptions_id', $assignment->id)->get();
//            $submission = AssignmentSubmission::where('assignment_descriptions_id',5)->get();
            $submissions->push($submission);
        }
//        return $submissions;

        //get all students
        return view('monitoring.course-overview', ['course' => $course, 'courseAssignments' => $courseAssignemts,
            'submissions' => $submissions,
            'user' => Auth::user()]);

    }

    public function updateCourse(Request $request)
    {

        return $request->all();
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //get the course by id;
        $course = Course::find($request->course_id);
        //return $course;
        //get all current instructors
        $courseInstructors = TeacherCourse::where('courses_id', '=', $request->course_id)->get();
        //get the group_teachers_id of this course and delete them
        TeacherCourse::where('courses_id', '=', $request->course_id)->get()->each->delete();
        //remove all the OLD teachers

        //return $course_teachers;
        //get the current values and save them in the DB
        $course->name = $request->name;
        $course->course_content = $request->course_content;
        $course->startdate = $request->startdate;
        $course->available_date = $request->available_date;
        $course->save();
        //return $course;
        $instructors = $request->instructors; //get instructors from the form

        //recreate instructors
        foreach ($instructors as $instructor) {
            TeacherCourse::create(
                [
                    'teachers_id' => $instructor,
                    'courses_id' => $course->id,
                ]
            );
        }
        return redirect('/courses');
    }

    public function updateCourseNew($id)
    {

        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //get the course by id;
        $course = Course::findOrFail($id);
        $materials = $course->course_materials;
        //return $course;
        //get the list of all intructors
//        §instructors =
        $courseInstructors = TeacherCourse::with('teacher')->where('courses_id', '=', $id)->get();
        //return $courseInstructors;
        //get all current instructors
//        $courseInstructors = TeacherCourse::where('courses_id', '=', $request->course_id)->get();
//        //get the group_teachers_id of this course and delete them
//        TeacherCourse::where('courses_id', '=', $request->course_id)->get()->each->delete();
        //remove all the OLD teachers

        //return $course_teachers;
        //get the current values and save them in the DB
//        $course->name = $request->name;
//        $course->course_content = $request->course_content;
//        $course->startdate = $request->startdate;
//        $course->available_date = $request->available_date;
//        $course->save();
//        //return $course;
//        $instructors = $request->instructors; //get instructors from the form
//
//        //recreate instructors
//        foreach ($instructors as $instructor) {
//            TeacherCourse::create(
//                [
//                    'teachers_id' => $instructor,
//                    'courses_id' => $course->id,
//                ]
//            );
//        }
//
        return view('design.update-course', [
                'course' => $course,
                'courseInstructors' => $courseInstructors,
                'user' => Auth::user(),
                'materials' => $materials,
        ]);

    }

    public function updateCourseById(Request $request, $id){

        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //get the course by id;
        $course = Course::findOrFail($id);
//        return $course;
        //get all current instructors
       // $courseInstructors = TeacherCourse::where('courses_id', '=', $request->course_id)->get();
        //get the group_teachers_id of this course and delete them
        TeacherCourse::where('courses_id', '=', $request->course_id)->get()->each->delete();
        //remove all the OLD teachers

        //return $course_teachers;
        //get the current values and save them in the DB
        $course->name = $request->name;
        $course->course_content = $request->course_content;
        $course->startdate = $request->startdate;
        $course->available_date = $request->available_date;
        $course->save();


//        if ($request->hasFile('material')) {
//            $coursematerial = new CourseMaterial;
//            $file_name = $request->file('material')->getClientOriginalName();
//            $path = $request->material->store('public/courseMaterials');
//            $arrayy = explode("/",$path);
//            $coursematerial->file_name = $file_name;
//            $coursematerial->path = "storage/courseMaterials/".$arrayy[2];
//            $coursematerial->courses_id = $course->id;
//            $coursematerial->save();
//            }
        
        //return $course;
        $instructors = $request->instructors; //get instructors from the form

        //recreate instructors
        foreach ($instructors as $instructor) {
            TeacherCourse::create(
                [
                    'teachers_id' => $instructor,
                    'courses_id' => $course->id,
                ]
            );
        }


        /**
         * Associanting materials with an course
         */
        foreach ($request->all() as $chave => $valor){
            if(strpos($chave, 'file') !== false){

                CourseMaterial::create([
                    'courses_id' => $id,
                    'path' => $valor
                ]);
            }

        }

        return redirect('/courses');
    }

    public function deleteCourseFile($id)
    {
        $material = CourseMaterial::findOrFail($id);

        $material->delete();

        return redirect('/update_course/'.$material->courses_id);
    }

    public function deleteCourse(Request $request)
    {
        //get teacher of this course
        $teachers = TeacherCourse::where('courses_id', $request->deletecourse_id)->get();
        //delele courses of there teachers
        foreach ($teachers as $teacher) {
            $teacherCourse = TeacherCourse::find($teacher->id);
            $teacherCourse->delete();
        }
        //get the course and delete
        Course::where('id', $request->deletecourse_id)->get()->each->delete();
        //Delete all assignment has courses
        AssignmentDescriptionsHasCourse::where('courses_id',$request->deletecourse_id)->get()
            ->each->delete();
        //delete all assignments of this course
        AssignmentDescription::where('courses_id',$request->deletecourse_id)->get()
            ->each->delete();
        return redirect('courses'); //go back to course list
    }

    public function courseDesignOverview(Request $request)
    {
        //get course details
        $course = Course::where('id', $request->id)->get();
        //get all assignments of this course
        $courseAssignemts = AssignmentDescription::where('courses_id', $request->id)->get();
//        get all submitted assignments of this course
        $submissions = collect();

        foreach ($courseAssignemts as $assignment) {
            $submission = AssignmentSubmission::where('assignment_descriptions_id', $assignment->id)->get();
//            $submission = AssignmentSubmission::where('assignment_descriptions_id',5)->get();
            $submissions->push($submission);
        }
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $teacherCourses;

        //get all students
        return view('design.coursedesign-overview', ['course' => $course, 'courseAssignments' => $courseAssignemts,
            'submissions' => $submissions,
            'teacherCourses' => $teacherCourses,
            'user' => Auth::user()]);

    }

    public function getCourseDetails()
    {
        return view('design.course-details', [
            'user' => Auth::user()]);
    }


    public function getInstructors()
    {
        $instructors = Teacher::all();
        return $instructors;
    }

//    MONITORING
    public function coursesOverview()
    {
        //get the current teacher info
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //get all teacher courses
        $courses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();

        //get all assignments
        $assignments = AssignmentDescriptionsHasTeacher::with('assignment_description')->where('teachers_id',
            $teacher->id)->get();
        //get all submissions
//        $submissions =
        //get all teacher assignments
        return view('monitoring.courses-overview',
            [
                'courses' => $courses,
                'assignments' => $assignments,
//            'submissions' => $submissions,
                'user' => Auth::user()]);
    }


    public function salvarImagem(Request $request)
    {

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $filePath = collect();
            foreach ($file as $ficheiro){
                $filename = time() . '' . $ficheiro->getClientOriginalName();
                $ficheiro->move('docs', $filename);
                $filePath->push('docs/' . '' . $filename);
            }

        } else {
            return response(['Nao existe Ficheiro']);
        }

        return ['imagem' => $filePath];
    }


}