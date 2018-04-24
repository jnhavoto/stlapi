<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentsCourse
 * 
 * @property int $id
 * @property int $students_id
 * @property int $courses_id
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Student $student
 * @property \App\Models\Course $course
 * @property \Illuminate\Database\Eloquent\Collection $self_assessments
 *
 * @package App\Models
 */
class StudentsCourse extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'students_id' => 'int',
		'courses_id' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'students_id',
		'courses_id',
		'start_date',
		'end_date',
		'status'
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function self_assessments()
	{
		return $this->hasMany(\App\Models\SelfAssessment::class, 'students_courses_id');
	}
}
