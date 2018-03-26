<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey='id';

    protected $table = 'departments';

    protected $fillable = [
        'name'
    ];

    public function courses(){
        return $this->hasMany('App\Models\Course', 'departments_id');
    }
}
