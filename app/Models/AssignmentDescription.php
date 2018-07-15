<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:33 +0000.
 */

namespace App\Models;

use Carbon\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescription
 * 
 * @property int $id
 * @property string $case
 * @property string $instructions
 * @property \Carbon\Carbon $startdate
 * @property \Carbon\Carbon $deadline
 * @property \Carbon\Carbon $available_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $group_teachers_id
 * @property int $status
 * 
 * @property \App\Models\GroupTeacher $group_teacher
 * @property \Illuminate\Database\Eloquent\Collection $assignment_announcements
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property \Illuminate\Database\Eloquent\Collection $assignment_submissions
 * @property \Illuminate\Database\Eloquent\Collection $groups
 *
 * @package App\Models
 */
class AssignmentDescription extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'group_teachers_id' => 'int',
		'status' => 'int',
        'courses_id' => 'int',
        'number' => 'int'
	];

	protected $dates = [
		'startdate',
		'deadline',
		'available_date'
	];

	protected $fillable = [
		'case',
        'number',
		'instructions',
		'startdate',
		'deadline',
		'available_date',
		'group_teachers_id',
		'status',
        'courses_id'
	];

	protected $with = ['assignment_announcements', 'teachers', 'assignment_submissions' ,'groups', 'courses'];

	public function group_teacher()
	{
		return $this->belongsTo(\App\Models\GroupTeacher::class, 'group_teachers_id');
	}

	public function assignment_announcements()
	{
		return $this->hasMany(\App\Models\AssignmentAnnouncement::class, 'assignment_descriptions_id');
	}

	public function teachers()
	{
		return $this->belongsToMany(\App\Models\Teacher::class, 'assignment_descriptions_has_teachers', 'assignment_descriptions_id', 'teachers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function assignment_submissions()
	{
		return $this->hasMany(\App\Models\AssignmentSubmission::class, 'assignment_descriptions_id');
	}

	public function groups()
	{
		return $this->belongsToMany(\App\Models\Group::class, 'groups_assignment_descriptions', 'assignment_descriptions_id', 'groups_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class, 'departments_id');
    }

    //formatting dates
//	public function getDeadLineAttribute($deadline){
//        $carbonated_date = Carbon::parse($deadline);
//        $diff_date = $carbonated_date->diffForHumans(Carbon::now());
//        return $diff_date;
//    }
	public function getDeadLineAttribute($deadline){
        $carbonated_date = Carbon::parse($deadline)->format('Y-m-d');
        return $carbonated_date;
    }
    public function getStartDateAttribute($startdate){
        $carbonated_date = Carbon::parse($startdate)->format('Y-m-d');
        return $carbonated_date;
    }
    public function getAvailableDateAttribute($available_date){
        $carbonated_date = Carbon::parse($available_date)->format('Y-m-d');
        return $carbonated_date;
    }

    public function getCaseAttribute($case){
	    return strtoupper($case);
    }

}
