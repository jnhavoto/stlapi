<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescriptionsHasCourse
 * 
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'assignment_descriptions_id' => 'int',
		'courses_id' => 'int'
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
