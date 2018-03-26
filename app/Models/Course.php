<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey='id';

    protected $table = 'courses';

    protected $fillable = [
        'name', 'course_content', 'departments_id'
    ];

    public function department(){
        return $this->belongsTo('App\Models\Department', 'departments_id');
    }

    public function assignment_submissions(){
        return $this->hasMany('App\Models\AssignmentSubmission', 'courses_id');
    }

    public function teacher_courses(){
        return $this->hasMany('App\Models\TeacherCourse', 'courses_id');
    }
}
