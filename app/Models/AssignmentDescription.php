<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentDescription extends Model
{
    protected $primaryKey='id';

    protected $table = 'assignment_descriptions';
    public $with = ['teacher_course'];
    protected $fillable = [
        'case', 'instructions', 'startdate', 'deadline', '	available_date', 'teacher_courses_id'
    ];



//================================
//    ==== Relationships ===
//================================

    public function teacher_course(){
        return $this->belongsTo('App\Models\TeacherCourse', 'teacher_courses_id');
    }

    public function group_assignments(){
        return $this->hasMany('App\Models\GroupAssignment', 'assignment_descriptions_id');
    }

    public function assignment_notifications(){
        return $this->hasMany('App\Models\AssignmentNotification', 'assignment_descriptions_id');
    }

}
