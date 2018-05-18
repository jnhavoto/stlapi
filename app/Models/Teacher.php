<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Teacher
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $users_id
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \Illuminate\Database\Eloquent\Collection $teacher_members
 *
 * @package App\Models
 */
class Teacher extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'users_id'
	];
        protected $with = ['user','courses'];


    public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}

	public function assignment_descriptions()
	{
		return $this->belongsToMany(\App\Models\AssignmentDescription::class, 'assignment_descriptions_has_teachers', 'teachers_id', 'assignment_descriptions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function courses()
	{
		return $this->belongsToMany(\App\Models\Course::class, 'teacher_courses', 'teachers_id', 'courses_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function teacher_members()
	{
		return $this->hasMany(\App\Models\TeacherMember::class, 'teachers_id');
	}
}
