<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getAllFeedbacks()
    {
        $feedbacks=Feedback::with('student')->get();
        return $feedbacks;
        return view('monitoring.feedbacks-overview',['feedbacks' => $feedbacks,
            'user' => Auth::user()]);
    }

}