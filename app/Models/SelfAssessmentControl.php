<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelfAssessmentControl extends Model
{
    protected $primaryKey='id';

    protected $table = 'self_assessment_controls';

    protected $fillable = ['self_assessment_number', 'students_id', 'self_assessments_id'];

}
