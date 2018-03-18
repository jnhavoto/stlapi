<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupHistory extends Model
{

    protected $primaryKey='id';

    protected $table = 'group_histories';

    protected $fillable = ['deadline','group_assignments_id','assignment_descriptions_id','students_id'];

}
