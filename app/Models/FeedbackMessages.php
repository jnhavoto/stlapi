<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FeedbackMessages extends Model
{
    protected $primaryKey='id';

    protected $table = 'assignment_notifications';

    protected $fillable = [
        'message', 'status', 'feedbacks_id'
    ];

    public function feedback_messages(){
        return $this->belongsTo('App\Models\Feedback', 'feedbacks_id');
    }

}