<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey='id';

    protected $table = 'users';

    protected $fillable = ['first_name', 'last_name', 'telephone', 'email', 'user_password', 'remember_token'];


// ==========================
    public function students(){
        return $this->hasMany('App\Models\Student', 'user_id');
    }

    public function teacher_course(){
        return $this->hasMany('App\Models\TeacherCourse', 'user_id');
    }


}
