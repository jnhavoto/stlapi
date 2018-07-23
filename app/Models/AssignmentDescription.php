<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescription
 * 
 * @property int $id
 * @property string $case
 * @property int $number
 * @property string $instructions
 * @property \Carbon\Carbon $startdate
 * @property \Carbon\Carbon $deadline
 * @property \Carbon\Carbon $available_date
 * @property int $status
 * @property int $group_teachers_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $courses_id
 * 
 * @property \App\Models\GroupTeacher $group_teacher
 * @property \App\Models\Course $course
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
		'number' => 'int',
		'status' => 'int',
		'group_teachers_id' => 'int',
		'courses_id' => 'int'
	];

    protected $with = ['course'];

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
		'status',
		'group_teachers_id',
		'courses_id'
	];

	public function group_teacher()
	{
		return $this->belongsTo(\App\Models\GroupTeacher::class, 'group_teachers_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function assignment_announcements()
	{
		return $this->hasMany(\App\Models\AssignmentAnnouncement::class, 'assignment_descriptions_id');
	}

	public function courses()
	{
		return $this->belongsToMany(\App\Models\Course::class, 'assignment_descriptions_has_courses', 'assignment_descriptions_id', 'courses_id')
					->withPivot('id');
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
}
