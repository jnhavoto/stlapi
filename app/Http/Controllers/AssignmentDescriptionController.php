<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionHasStudent;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentMaterial;
use App\Models\AssignmentSubmission;
use App\Models\AssignmentTemplate;
use App\Models\Course;
use App\Models\CoursesTemplate;
use App\Models\GroupTeacher;
use App\Models\Material;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherCourse;
use App\Models\TeacherMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssignmentDescriptionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentDescription();
        $this->objectName = 'assignment_description';
        $this->objectNames = 'assignment_descriptions';
        $this->relactionships = [];
    }


    public function getByDeadline()
    {
        $lastAssignment = AssignmentDescription::orderBy('deadline','desc')->first();
        return response()->json(['lastAssignment'=>$lastAssignment]);
    }

    //UPDATES OF ASSIGNMENT

    public function getUpdateAssignment($id){
        //get an assignment by id
        $assignment = AssignmentDescription::findOrFail($id);

        $teacher = Teacher::where('users_id',Auth::user()->id)->first();

        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
        //get all instructors
        $instructors = Teacher::all();
        //get current instructors
        $currentInstructors = AssignmentDescriptionsHasTeacher::where('assignment_descriptions_id',$id)->get();
//        return $currentInstructors;

        return view('design.update-assignment',[
            'assignment' => $assignment,
            'instructors' => $instructors,
            'currentInstructors' => $currentInstructors,
            'teacherCourses'=>$teacherCourses, 'user' =>
            Auth::user()]);
    }

    public function updateAssignment(Request $request)
    {
        //get the current assignment
        $assignment = AssignmentDescription::find($request->assignment_id);
        //do updates and save
        $assignment->case = $request->case;
        $assignment->number = $request->number;
        $assignment->instructions = $request->instructions;
        $assignment->startdate = $request->startdate;
        $assignment->deadline = $request->deadline;
        $assignment->available_date = $request->availabledate;
        $assignment->courses_id = $request->course_id;
        $assignment->save();
        //delete each old instructor
        AssignmentDescriptionsHasTeacher::where('assignment_descriptions_id',$request->assignment_id)
            ->get()->each->delete();
        //save current instructors
        foreach ($request->instructors as $currentInstructor)
        {
             AssignmentDescriptionsHasTeacher::create(
                [
                    'assignment_descriptions_id' => $assignment->id,
                    'teachers_id' => $currentInstructor,
                ]
            );
        }

        foreach ($request->all() as $chave => $valor){
            if(strpos($chave, 'file') !== false){

                Material::create([
                    'assignment_description_id' => $assignment->id,
                    'path' => $valor,
                    'file_name' => explode('-a-', $valor)[1],
                ]);
            }
        }
        return redirect('/assignments');
    }

    public function deleteAssignment(Request $request)
    {
        //get the current teacher
        $teacher = Teacher::where('users_id',Auth::user()->id)->first();
        //find and delete the link between the assignment and the teacher: current teacher

        AssignmentDescriptionsHasTeacher::where('assignment_descriptions_id',$request->deleteassignment_id)->get()->each->delete();


        //find and delete the lilnk between the assignment and the course: current teacher
        AssignmentDescriptionsHasCourse::where('assignment_descriptions_id', $request->deleteassignment_id)->get()->each->delete();
        //find and delete the assignment
        AssignmentDescription::where('id', $request->deleteassignment_id)->get()->each->delete();
        //Verify if all deletes happened
//        if(!$assignTeacher and $assignCourse and $assignment){
            return redirect('assignments'); //go back to course list
//        }
    }

    public function getCreateAssignFromForm()
    {
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $course;
//        return $teacherAssignment;
        return view('design.assignment-createnew', [
                'teacherCourses' => $teacherCourses,
                'user' => Auth::user
                ()]);
    }

    //get all assignments and teacher assignments
    public function getAssignments()
    {
        //first get all assignments
        $assTemplates = AssignmentTemplate::all();
        //get the detailks of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //list of assignment where the current teacher is a member
        $teacherAssignment = $teacher->assignment_descriptions()->get();

//        return $teacherAssignment;

//            AssignmentDescriptionsHasTeacher::with('assignment_description')->
//            where('teachers_id',$teacher->id)->get();

        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $course;
//        return $teacherAssignment;
        return view('design.assignment',
            ['assTemplates' => $assTemplates,
                'teacherAssignment' => $teacherAssignment,
                'teacherCourses' => $teacherCourses,
                'user' => Auth::user
                ()]);
    }

    //get assignment templates to use to create a new assignment
    public function getAssignmentTemplates($id)
    {
        $course = Course::findOrFail($id);
        //first get all assignments
        $assTemplates = AssignmentTemplate::all();
        //get the detailks of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //list of assignment where the current teacher is a member
        $teacherAssignment = AssignmentDescriptionsHasTeacher::with('assignment_description')->
            where('teachers_id',$teacher->id)->get();
        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return $courses;
        return view('design.assignment-templates',
            ['assTemplates' => $assTemplates,
                'teacherAssignment' => $teacherAssignment,
                'teacherCourses' => $teacherCourses,
                'course' => $course,
                'user' => Auth::user
                ()]);
    }

//    Begin Admin
    public function admin_getAssignTemplates()
    {
        //first get all assignments
        $assTemplates = AssignmentTemplate::all();
//        return $courses;
        return view('design.admin_assign_templates',
            ['assTemplates' => $assTemplates,
                'userd' => Auth::user(),
                'user' => Auth::user()
            ]);
    }

    public function admin_getCourseTemplates()
    {
        //first get all assignments
        $courseTemplates = CoursesTemplate::all();
//        return $courseTemplates;
//        return $courses;
        return view('design.admin_course_templates',
            ['courseTemplates' => $courseTemplates,
                'userd' => Auth::user(),
                'user' => Auth::user()
            ]);
    }

    //END Admin

    public function assignmentDesignOverview($id)
    {
        $assignment = AssignmentDescription::findOrFail($id);
        $instructors = AssignmentDescriptionsHasTeacher::with('teacher')->where('assignment_descriptions_id',$id)
            ->get();
        $material = Material::where('assignment_description_id',$id)->get();


        return view('design.assignment-designoverview', ['assignment' => $assignment,
            'instructors' => $instructors,
            'materials' => $material,
           'user' => Auth::user()]);
    }

    public function createAssignment(Request $request)
    {
        //get teacher ID: who logged in
//        return $request;
        //Begin transaction
        DB::beginTransaction();

        ////createing group_teacher
        $group_teacher = GroupTeacher::create(
            [
                'group_name' => 'Default Name',
            ]
        );

        if (!$group_teacher) {
            DB::rollBack();
            return ['Error when save GroupTeacher'];
        } else {
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
                ]
            );

            $assignHasCourse = AssignmentDescriptionsHasCourse::create(
                [
                    'assignment_descriptions_id' => $assigment->id,
                    'courses_id' => $request->course_id,
                ]
            );

           $courseTeacher = TeacherCourse::Where('courses_id', $request->course_id)->get();
//            return $courseTeacher;

            foreach ($courseTeacher as $instructor)
            {
                $assignHasTeacher = AssignmentDescriptionsHasTeacher::create(
                    [
                        'assignment_descriptions_id' => $assigment->id,
                        'teachers_id' => $instructor->teachers_id,
                    ]
                );
            }
        }

        if ($assigment and $assignHasCourse and $assignHasTeacher) {
            DB::commit();
            foreach ($request->all() as $chave => $valor){
                if(strpos($chave, 'file') !== false){

                    Material::create([
                        'assignments_id' => $assigment->id,
                        'path' => $valor,
                        'file_name' => explode('-a-', $valor)[1],
                    ]);
                }
            }
            return redirect('/assignments');
        } else {
            DB::rollBack();
            return "Error when save Assignment Description";
        }
    }

    public function createAssignmentFromTemplate(Request $request)
    {
//        return $request;
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();
        //create group_teacher
        $group_teacher = GroupTeacher::create(
            [
                'group_name' => 'Default Name',
            ]
        );

        if (!$group_teacher) {
            DB::rollBack();
            return ['Error when save GroupTeacher'];
        } else {
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
                ]
            );

            $assignHasCourse = AssignmentDescriptionsHasCourse::create(
                [
                    'assignment_descriptions_id' => $assigment->id,
                    'courses_id' => $request->course_id,
                ]
            );

            $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
            $courseTeacher = TeacherCourse::Where('courses_id', $request->course_id)->get();
//            return $courseTeacher;
            $students = Student::all();
            //fill AssignHasStudent
            foreach ($students as $student)
            {
                $assignHasStudent = AssignmentDescriptionHasStudent::create([
                   'assignment_description_id'=> $assigment->id,
                    'students_id'=>$student->id,
                ]);
            }

            foreach ($courseTeacher as $instructor)
            {
                $assignHasTeacher = AssignmentDescriptionsHasTeacher::create(
                    [
                        'assignment_descriptions_id' => $assigment->id,
                        'teachers_id' => $instructor->teachers_id,
                    ]
                );
            }

        }

        if ($assigment and $assignHasCourse and $assignHasTeacher and $assignHasStudent) {
            DB::commit();
            //saving files
            foreach ($request->all() as $chave => $valor){
                if(strpos($chave, 'file') !== false)
                {
                    Material::create([
                        'assignment_description_id' => $assigment->id,
                        'path' => $valor,
                        'file_name' => explode('-a-', $valor)[1],
                    ]);
                }
            }
            return redirect('/course-designoverview/'.$request->course_id);
        } else {
            DB::rollBack();
            return "Error when save Assignment Description";
        }
    }

    public function getassignfromtemplate($id)
    {
        //get teacher data
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
//        return $id;
        $assignment = AssignmentTemplate::findOrFail($id);

//        return $assignment;
//        $courseInstructors = Teacher::all();
        //get all teachers courses
        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
        return view('design.assignment-createfromtemplate',
            ['assignment' => $assignment,
                'teacherCourses' => $teacherCourses,
//            'courseInstructors' => $courseInstructors,
            'user' => Auth::user()]);
    }

    public function createAssignmentFromCourseOverview(Request $request)
    {
        //get teacher ID: who logged in
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //Begin transaction
        DB::beginTransaction();

        ////createing group_teacher
        $group_teacher = GroupTeacher::create(
            [
                'group_name' => 'Default Name',
            ]
        );


        if (!$group_teacher) {
            DB::rollBack();
            return ['Error when save GroupTeacher'];
        } else {
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
                ]
            );

            $assignHasCourse = AssignmentDescriptionsHasCourse::create(
                [
                    'assignment_descriptions_id' => $assigment->id,
                    'courses_id' => $request->course_id,
                ]
            );

            $teacher = Teacher::Where('users_id', Auth::user()->id)->first();

            $assignHasTeacher = AssignmentDescriptionsHasTeacher::create(
                [
                    'assignment_descriptions_id' => $assigment->id,
                    'teachers_id' => $teacher->id,
                ]
            );

        }

        if ($assigment and $assignHasCourse and $assignHasTeacher) {
            DB::commit();
            return redirect('/coursedesign-overview/'.$request->course_id);
        } else {
            DB::rollBack();
            return "Error when save Assignment Description";
        }
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
            return response(['No Files']);
        }
        return ['imagem' => $filePath];
    }
}
