<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    protected $primaryKey='id';

    protected $table = 'feedbacks';

    protected $fillable = [
        'goal', 'message', 'advice', 'comment', 'feedback_date', 'assignment_submissions_id', 'students_id'
    ];

//    Relationships
    public function assignment_submission(){
        return $this->belongsTo('App\Models\AssignmentSubmission', 'assignment_submissions_id');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student', 'students_id');
    }

    public function feedback_messages(){
        return $this->hasMany('App\Models\FeedbackMessage', 'feedbacks_id');
    }

    public function rating_feedback(){
        return $this->hasOne('App\Models\RatingFeedback', 'feedbacks_id');
    }

}
