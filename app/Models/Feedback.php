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
}
