<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentDescription extends Model
{
    protected $primaryKey='id';

    protected $table = 'assignment_descriptions';

    protected $fillable = [
        'case', 'instructions', 'startdate', 'deadline', '	available_date', 'teacher_courses_id'
    ];
}
