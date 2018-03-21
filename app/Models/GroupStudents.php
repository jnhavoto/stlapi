<?php
/**
 * Created by PhpStorm.
 * User: Sumburane
 * Date: 3/21/2018
 * Time: 10:26 PM
 */

namespace App\Models;


class GroupStudents
{

    protected $primaryKey='id';

    protected $table = 'group_students';

    protected $fillable = [
        'groups_id', 'students_id'
    ];

}