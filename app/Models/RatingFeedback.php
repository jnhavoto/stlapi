<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingFeedback extends Model
{

    protected $primaryKey='id';

    protected $table = 'rating_feedbacks';

    protected $fillable = ['goal','timing','message','advice','comment','feedback_rating_date','students_id','feedbacks_id'];

}
