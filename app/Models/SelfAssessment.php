<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelfAssessment extends Model
{

    protected $primaryKey='id';

    protected $table = 'self_assessment_assigments';

    protected $fillable = ['deadline','self_assessments_id','teachers_id'];

}
