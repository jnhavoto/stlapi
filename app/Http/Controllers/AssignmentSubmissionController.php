<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use Illuminate\Http\Request;

class AssignmentSubmissionController extends ModelController
{

    public function __construct() {
        $this->object = new AssignmentSubmission();
        $this->objectName = 'assignment_submission';
        $this->objectNames = 'assignment_submissions';
        $this->relactionships = [];
    }


    public function getAssignmentSubmition($student_id, $assignment_desc_id){
        $assignment_sub =  AssignmentSubmission::where('assignment_descriptions_id', '=', $assignment_desc_id)->where('students_id', '=', $student_id)->first();
        return ['assignment_submition' => $assignment_sub];
    }


    /**
     * @param Request $request
     * Cria um novo assignment na base de dados ou actualiza caso ja exista
     */
    public function store(Request $request){
        return ['retorno' => $request->all()];

//       $assignemnt = AssignmentSubmission::updateOrCreate(
//        [
//            'id' => $request->get('assignment')['id']
//        ],
//
//        [
//            $request->get('assignment')
//        ]
//        );
//
//       return ['assignment_submition' => $assignemnt];

    }



    public function teste(Request $request){
        return ['retorno' => $request->all()];
    }





}