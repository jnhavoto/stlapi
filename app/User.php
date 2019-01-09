<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticateble;

class User extends Authenticateble
{
    protected $primaryKey='id';

    protected $table = 'users';


    /*
     * User Type :
     * 1 = Admin
     * 2 = Teacher
     * 3 = Student
     */
    protected $fillable = ['first_name', 'last_name', 'telephone', 'email', 'password','user_type', 'remember_token'];



// ==========================
    public function student(){
        return $this->hasOne('App\Models\Student', 'users_id');
    }

    public function teacher(){
        return $this->hasOne('App\Models\Teacher', 'users_id');
    }


    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }


}
