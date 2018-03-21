<?php

namespace App\Models;


class StudentTeacherMessages
{

    protected $primaryKey='id';

    protected $table = 'student_teacher_messages';

    protected $fillable = [
        'message', 'status', 'students_id', 'teachers_id'
    ];

}