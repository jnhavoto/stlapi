<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $primaryKey='id';

    protected $table = 'teachers';

    protected $fillable = ['name', 'user_id'];



//================================
//    ==== Relationships ===
//================================

    public function student_teacher_messages(){
        return $this->hasMany('App\Models\StudentTeacherMessages', 'teachers_id');
    }

    public function assignment_submissions(){
        return $this->hasMany('App\Models\AssignmentSubmission', 'teachers_id');
    }

    public function teacher_courses(){
        return $this->hasMany('App\Models\TeacherCourse', 'teachers_id');
    }

    public function self_assigments(){
        return $this->hasMany('App\Models\SelfAssessment', 'teachers_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
