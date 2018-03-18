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
}
