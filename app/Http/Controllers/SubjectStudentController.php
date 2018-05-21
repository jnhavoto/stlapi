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
               if($studentSubject['subjects_id'] == $subject['id'])
                   $contains = true;
           }

           if(!$contains)
               $studentSubject->delete();

       }

        foreach ($request->get('subjects') as $subject){
            $contains = false;
            foreach ($studentSubjects as $studentSubject){
                if($studentSubject['subjects_id'] == $subject['id'])
                    $contains = true;
            }

            if(!$contains)
                SubjectsHasStudent::create(['students_id' => $request->student_id, 'subjects_id' => $subject['id']]);

        }


        return [
                'subjects' =>  SubjectsHasStudent::where('students_id', '=', $request->get('student_id'))
                            ->join('subjects', 'subjects_has_students.subjects_id', '=', 'subjects.id')
                            ->get()
        ];

    }


}