<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends ModelController
{

    public function __construct() {
        $this->object = new Feedback();
        $this->objectName = 'feedback';
        $this->objectNames = 'feedbacks';
        $this->relactionships = [];
    }



    /**
     * Retorna os feedbacks de uma Feitos para um estudante
     * @param $id
     */
    public function getFeedbackForStudent($student_id){
        $feedbacks = Feedback::with('student')
            ->join('assignment_submissions', 'feedbacks.assignment_submissions_id', '=', 'assignment_submissions.id')
            ->where('assignment_submissions.students_id', '=', $student_id)
            ->select('feedbacks.*')->get();

        return ['feedbacks' => $feedbacks];
    }

//    public function getAllFeedbacks($id)
//    {
//        $feedbacks= \App\Models\Feedback::where('assignment_submissions_id',$id)->get();
//        $submission =
//        $feedbacks = Feedback::where(''$id);
//        return view('monitoring.feedbacks',['feedbacks' => $feedbacks,
//            'user' => Auth::user()]);
//    }

}