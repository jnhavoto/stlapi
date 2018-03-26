<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupHistory extends Model
{

    protected $primaryKey='id';

    protected $table = 'group_histories';

    protected $fillable = ['deadline','group_assignments_id','groups_id'];


    public function group_assignment(){
        return $this->belongsTo('App\Models\GroupAssignment', 'group_assignments_id');
    }

    public function group(){
        return $this->belongsTo('App\Models\Group', 'groups_id');
    }
}
