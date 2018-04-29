<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $id
 * @property string $name
 * @property string $course_content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $departments_id
 * 
 * @property \App\Models\Department $department
 * @property \Illuminate\Database\Eloquent\Collection $students
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'departments_id' => 'int'
	];

	protected $fillable = [
		'name',
		'course_content',
		'departments_id'
	];

	public function department()
	{
		return $this->belongsTo(\App\Models\Department::class, 'departments_id');
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
}
