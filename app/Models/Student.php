<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey='student_id';

    protected $table = 'students';

    protected $fillable = [
        'city_id', 'school_id'
    ];

    public function school(){
        return $this->belongsTo('App\Models\School', 'school_id');
    }
}
