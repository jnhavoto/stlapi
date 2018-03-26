<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupAssignment extends Model
{

    protected $primaryKey='id';

    protected $table = 'group_assignments';

    protected $fillable = ['group_cod','presence','activity_date', 'assignment_descriptions_id'];

    public function assignment_description(){
        return $this->belongsTo('App\Models\AssignmentDescription', 'assignment_descriptions_id');
    }

    public function group_histories(){
        return $this->hasMany('App\Models\GroupHistory', 'group_assignments_id');
    }

    public function assignment_submission(){
        return $this->hasOne('App\Models\AssignmentSubmission', 'group_assignments_id');
    }

}
