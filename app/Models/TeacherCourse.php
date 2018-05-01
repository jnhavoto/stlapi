<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TeacherCourse
 * 
 * @property int $id
 * @property int $teachers_id
 * @property int $courses_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Teacher $teacher
 * @property \App\Models\Course $course
 *
 * @package App\Models
 */
class TeacherCourse extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'teachers_id' => 'int',
		'courses_id' => 'int'
	];

	protected $fillable = [
		'teachers_id',
		'courses_id'
	];

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}
}
