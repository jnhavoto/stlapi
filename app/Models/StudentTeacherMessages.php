<?php

namespace App\Models;


class StudentTeacherMessages
{

    protected $primaryKey='id';

    protected $table = 'student_teacher_messages';

    protected $fillable = [
        'message', 'status', 'students_id', 'teachers_id'
    ];


//    ========================================
//      ======== Relationships ==========
//    ========================================

    public function student(){
        return $this->belongsTo('App\Models\Student', 'students_id');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teachers_id');
    }

}