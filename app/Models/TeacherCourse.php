<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{

    protected $primaryKey='id';

    protected $table = 'teacher_courses';

    protected $fillable = ['name', 'teachers_id', 'courses_id'];

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teachers_id');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course', 'courses_id');
    }



}
