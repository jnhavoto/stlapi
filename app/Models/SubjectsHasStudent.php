<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SubjectsHasStudent
 * 
 * @property int $subjects_id
 * @property int $students_id
 * @property int $id
 * 
 * @property \App\Models\Subject $subject
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class SubjectsHasStudent extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'subjects_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'subjects_id',
		'students_id'
	];

	public function subject()
	{
		return $this->belongsTo(\App\Models\Subject::class, 'subjects_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
