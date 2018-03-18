<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupAssignment extends Model
{

    protected $primaryKey='id';

    protected $table = 'group_assignments';

    protected $fillable = ['group_cod','presence','activity_date'];

}
