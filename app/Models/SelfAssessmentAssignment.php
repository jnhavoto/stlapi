<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelfAssessmentAssignment extends Model
{
    protected $fillable = ['deadline','self_assessments_id','teachers_id'];

}
