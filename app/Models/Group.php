<?php

namespace App\Models;


class Group
{

    protected $primaryKey='id';

    protected $table = 'groups';

    protected $fillable = [
       'group_cod','group_name'
    ];

}