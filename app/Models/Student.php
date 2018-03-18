<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey='id';

    protected $table = 'students';

    protected $fillable = [
        'cities_id', 'schools_id', 'users_id', 'digital_tools','teaching_grade', 'workplace_tools',
        'workplace_tools_othe', 'work_methods', 'subjects', 'years_as_teacher',
        'technical_support', 'student_to_feedback', 'student_to_feedback_other',
        'technology_use_in_teaching'
    ];

    public function school(){
        return $this->belongsTo('App\Models\School', 'schools_id');
    }

    public function city(){
        return $this->belongsTo('App\Models\City', 'cities_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'users_id');
    }


}
