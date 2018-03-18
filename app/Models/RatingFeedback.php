<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingFeedback extends Model
{
    protected $fillable = ['goal','timing','message','advice','comment','feedback_rating_date','students_id','feedbacks_id'];

}
