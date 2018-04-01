<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticateble;

class User extends Authenticateble
{
    protected $primaryKey='id';

    protected $table = 'users';

    protected $fillable = ['first_name', 'last_name', 'telephone', 'email', 'password', 'remember_token'];


// ==========================
    public function student(){
        return $this->hasMany('App\Models\Student', 'users_id');
    }

    public function teacher(){
        return $this->hasMany('App\Models\Teacher', 'users_id');
    }


    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }


}
