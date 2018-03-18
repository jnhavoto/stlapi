<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{

    protected $primaryKey='id';

    protected $table = 'teacher_courses';

    protected $fillable = ['name'];

}
