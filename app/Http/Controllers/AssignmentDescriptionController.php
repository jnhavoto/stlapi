<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentDescriptionsHasCourse;
use App\Models\AssignmentDescriptionsHasTeacher;
use App\Models\AssignmentSubmission;
use App\Models\AssignmentTemplate;
use App\Models\Course;
use App\Models\GroupTeacher;
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

    public function updateAssignment($id){
        //get an assignment by id
        $assignment = AssignmentDescription::findOrFail($id);

        $teacher = Teacher::where('users_id',Auth::user()->id)->first();

        $teacherCourses = TeacherCourse::with('course')->where('teachers_id',$teacher->id)->get();
//        return  $teacherCourses;
//        $assignment->case = $request->case;
//        $assignment->number = $request->number;
//        $assignment->instructions = $request->instructions;
//        $assignment->startdate = $request->startdate;
//        $assignment->deadline = $request->deadline;
//        $assignment->available_date = $request->availabledate;
//        $assignment->course_id = $request->course_id;
//        $assignment->save();

        return view('design.update-assignment',['assignment' => $assignment, 'teacherCourses'=>$teacherCourses, 'user' =>
            Auth::user()]);
    }

    public function updateAssignmentByID(Request $assign)
    {
        $assignment = AssignmentDescription::find($assign->assignment_id);
        $assignment->case = $assign->case;
        $assignment->number = $assign->number;
        $assignment->instructions = $assign->instructions;
        $assignment->startdate = $assign->startdate;
        $assignment->deadline = $assign->deadline;
        $assignment->available_date = $assign->availabledate;
        $assignment->course_id = $assign->course_id;
        $assignment->save();

        return redirect('/assignments');
    }

    public function deleteAssignment(Request $request)
    {
        //get the current teacher
        $teacher = Teacher::where('users_id',Auth::user()->id)->first();
        //find and delete the link between the assignment and the teacher: current teacher
        $assignTeacher = AssignmentDescriptionsHasTeacher::
                        where([['assignment_descriptions_id',$request->deleteassignment_id],['teachers_id','=',
        $teacher->id]])
                        ->get()->each->delete();
        //find and delete the lilnk between the assignment and the course: current teacher
        $assignCourse = AssignmentDescriptionsHasCourse::where('assignment_descriptions_id', $request->deleteassignment_id)->get()->each->delete();
        //find and delete the assignment
        $assignment = AssignmentDescription::where('id', $request->deleteassignment_id)->get()->each->delete();
        //Verify if all deletes happened
//        if(!$assignTeacher and $assignCourse and $assignment){
            return redirect('assignments'); //go back to course list
//        }
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
        //get the detailks of the teacher
        $teacher = Teacher::Where('users_id', Auth::user()->id)->first();
        //list of assignment where the current teacher is a member
        $teacherAssignment = $teacher->assignment_descriptions()->get();

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



    public function createAssignment(Request $request)
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
            return redirect('/assignments');
        } else {
            DB::rollBack();
            return "Error when save Assignment Description";
        }
    }

    public function createAssignmentFromTemplate(Request $request)
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
}
