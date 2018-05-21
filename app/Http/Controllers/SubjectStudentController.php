<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SubjectsHasStudent;
use Illuminate\Http\Request;

class SubjectStudentController extends ModelController
{

    public function __construct() {
        $this->object = new SubjectsHasStudent();
        $this->objectName = 'subject_student';
        $this->objectNames = 'subject_students';
        $this->relactionships = [];
    }



    public function store(Request $request)
    {
       $studentSubjects = SubjectsHasStudent::where('students_id', '=', $request->get('student_id'))->get();


        foreach ($studentSubjects as $studentSubject){
           $contains = false;
            foreach ($request->get('subjects') as $subject){
               if($studentSubjects['subjects_id'] == $subject['subjects_id'])
                   $contains = true;
           }

           if(!$contains)
               $studentSubject->delete();

       }

        foreach ($request->get('subject') as $subject){
            $contains = false;
            foreach ($studentSubjects as $studentSubject){
                if($studentSubjects['subjects_id'] == $subject['subjects_id'])
                    $contains = true;
            }

            if(!$contains)
                SubjectsHasStudent::create($subject);

        }


        return ['subjects' => $studentSubjects = SubjectsHasStudent::where('students_id', '=', $request->get('student_id'))->get()];

    }


}