<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescription
 * 
 * @property int $id
 * @property \Carbon\Carbon $startdate
 * @property \Carbon\Carbon $deadline
 * @property \Carbon\Carbon $available_date
 * @property int $status
 * @property int $assignment_template_id
 * @property int $group_teachers_id
 * @property int $courses_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\GroupTeacher $group_teacher
 * @property \App\Models\Course $course
 * @property \App\Models\AssignmentTemplate $assignment_template
 * @property \Illuminate\Database\Eloquent\Collection $assignment_announcements
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property \Illuminate\Database\Eloquent\Collection $assignment_materials
 * @property \Illuminate\Database\Eloquent\Collection $assignment_submissions
 * @property \Illuminate\Database\Eloquent\Collection $groups
 *
 * @package App\Models
 */
class AssignmentDescription extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'assignment_description';

	protected $casts = [
		'status' => 'int',
		'assignment_template_id' => 'int',
		'group_teachers_id' => 'int',

	];

	protected $dates = [
		'startdate',
		'deadline',
		'available_date'
	];

	protected $fillable = [


		'startdate',
		'deadline',
		'available_date',
		'status',
		'assignment_template_id',
		'group_teachers_id',
	];

	protected $with = ['assignment_announcements', 'teachers', 'assignment_submissions' ,'groups', 'courses'];


	public function group_teacher()
	{
		return $this->belongsTo(\App\Models\GroupTeacher::class, 'group_teachers_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function assignment_template()
	{
		return $this->belongsTo(\App\Models\AssignmentTemplate::class);
	}

	public function assignment_announcements()
	{
		return $this->hasMany(\App\Models\AssignmentAnnouncement::class, 'assignment_descriptions_id');
	}

	public function courses()
	{
		return $this->belongsToMany(\App\Models\Course::class, 'assignment_descriptions_has_courses', 'assignment_descriptions_id', 'courses_id');
	}

	public function teachers()
	{
		return $this->belongsToMany(\App\Models\Teacher::class, 'assignment_descriptions_has_teachers', 'assignment_descriptions_id', 'teachers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function assignment_materials()
	{
		return $this->hasMany(\App\Models\AssignmentMaterial::class);
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
