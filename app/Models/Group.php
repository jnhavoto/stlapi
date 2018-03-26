<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $primaryKey='id';

    protected $table = 'groups';

    protected $fillable = [
       'group_cod','group_name'
    ];

    public function group_students(){
        return $this->hasMany('App\Models\GroupStudents', 'groups_id');
    }

    public function group_histories(){
        return $this->hasMany('App\Models\GroupHistory', 'groups_id');
    }

}