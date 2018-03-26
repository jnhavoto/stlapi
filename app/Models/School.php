<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $primaryKey='id';

    protected $table = 'schools';

    protected $fillable = ['school_name'];



    public function student(){
        return $this->hasMany('App\Models\Student', 'schools_id');
    }

}
