<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AssignmentNotifications extends Model
{
    protected $primaryKey='id';

    protected $table = 'assignment_notifications';

    protected $fillable = [
        'message', 'status', 'assignment_descriptions_id'
    ];

    public function assignment_description(){
        return $this->belongsTo('App\Models\AssignmentDescription', 'assignment_descriptions_id');
    }

}