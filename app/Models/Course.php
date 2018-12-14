<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $id
 * @property string $name
 * @property string $course_content
 * @property \Carbon\Carbon $startdate
 * @property \Carbon\Carbon $available_date
 * @property int $status
 * @property int $departments_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Department $department
 * @property \Illuminate\Database\Eloquent\Collection $announcements
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 * @property \Illuminate\Database\Eloquent\Collection $course_announcements
 * @property \Illuminate\Database\Eloquent\Collection $materials
 * @property \Illuminate\Database\Eloquent\Collection $students
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 * @property \Illuminate\Database\Eloquent\Collection $users_chats
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'status' => 'int',
		'departments_id' => 'int'
	];

	protected $dates = [
		'startdate',
		'available_date'
	];

	protected $fillable = [
		'name',
		'course_content',
		'startdate',
		'available_date',
		'status',
		'departments_id'
	];

	public function department()
	{
		return $this->belongsTo(\App\Models\Department::class, 'departments_id');
	}

	public function announcements()
	{
		return $this->hasMany(\App\Models\Announcement::class, 'courses_id');
	}

	public function assignment_descriptions()
	{
		return $this->belongsToMany(\App\Models\AssignmentDescription::class, 'assignment_descriptions_has_courses', 'courses_id', 'assignment_descriptions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function course_announcements()
	{
		return $this->hasMany(\App\Models\CourseAnnouncement::class, 'courses_id');
	}

	public function materials()
	{
		return $this->hasMany(\App\Models\Material::class, 'courses_id');
	}

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'students_courses', 'courses_id', 'students_id')
					->withPivot('id', 'start_date', 'end_date', 'status', 'deleted_at')
					->withTimestamps();
	}

	public function teachers()
	{
		return $this->belongsToMany(\App\Models\Teacher::class, 'teacher_courses', 'courses_id', 'teachers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function users_chats()
	{
		return $this->hasMany(\App\Models\UsersChat::class, 'courses_id');
	}
}
