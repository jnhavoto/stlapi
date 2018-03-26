<?php
/**
 * Created by PhpStorm.
 * User: Sumburane
 * Date: 3/21/2018
 * Time: 10:26 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class GroupStudents extends Model
{

    protected $primaryKey='id';

    protected $table = 'group_students';

    protected $fillable = [
        'groups_id', 'students_id'
    ];



    public function student(){
        return $this->belongsTo('App\Models\Student', 'students_id');
    }

    public function group(){
        return $this->belongsTo('App\Models\Group', 'groups_id');
    }
}