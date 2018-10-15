<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescriptionsHasCourse
 * 
 * @property int $id
 * @property int $assignment_descriptions_id
 * @property int $courses_id
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\Course $course
 *
 * @package App\Models
 */
class AssignmentDescriptionsHasCourse extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'assignment_descriptions_id' => 'int',
		'courses_id' => 'int'
	];

	protected $fillable = [
		'assignment_descriptions_id',
		'courses_id'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}
}
