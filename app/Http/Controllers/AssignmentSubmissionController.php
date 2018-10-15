<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use App\Models\AssignmentSubmission;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignmentSubmissionController extends ModelController
{

    public function __construct()
    {
        $this->object = new AssignmentSubmission();
        $this->objectName = 'assignment_submission';
        $this->objectNames = 'assignment_submissions';
        $this->relactionships = [];
    }


    public function getAssignmentSubmition($student_id, $assignment_desc_id)
    {
        $assignment_sub = AssignmentSubmission::where('assignment_descriptions_id', '=', $assignment_desc_id)->where('students_id', '=', $student_id)->first();
        return ['assignment_submition' => $assignment_sub];
    }


    /**
     * @param Request $request
     * Cria um novo assignment na base de dados ou actualiza caso ja exista
     */
    public function salvarOrUpdateAssignment(Request $request)
    {

        if ($request->get('operation') == 'save') {
            AssignmentDescription::find($request->get('assignment')['assignment_descriptions_id'])->update(['status' => 1]);
        }

        if ($request->get('assignment')['id'] == null) {
            $assignemnt = AssignmentSubmission::create($request->get('assignment'));
        } else {
            $assignemnt = AssignmentSubmission::find($request->get('assignment')['id'])->update($request->get('assignment'));
        }

        return ['assignment_submition' => $assignemnt];

    }

    public function subDetails(Request $request)
    {

        $submission = AssignmentSubmission::where('id', $request->id)->get();

//        return redirect('activities.submission-details');

        return view('activities.submission-details', ['sunvffv' => $submission, 'user'=>Auth::user()]);

    }

    public function listSubmission($id)
    {
        $submissions = AssignmentSubmission::with('student')->where('assignment_descriptions_id', $id)->get();

//       return $submissions;

        return view('monitoring.submissions', ['submissions' => $submissions, 'user'=>Auth::user()]);
    }

    public function submissionDetails($id)
    {
        $submission = AssignmentSubmission::with('student')->where('id', $id)->first();
//        return $submission;

        return view('monitoring.submission-details', ['submission' => $submission, 'user'=>Auth::user()]);
    }



}