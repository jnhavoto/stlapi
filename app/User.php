<?php

namespace App;

use App\Models\UserType;
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
    protected $fillable = ['first_name', 'last_name', 'telephone', 'email', 'password','user_type', 'remember_token','last_login'
        ,'schools_id','cities_id','user_types_id'
    ];

    protected $with = ['school', 'city', 'user_type'];



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

    public function school()
    {
        return $this->belongsTo(\App\Models\School::class, 'schools_id');
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'cities_id');
    }

    public function user_type()
    {
        return $this->belongsTo(UserType::class, 'user_types_id');
    }

}
