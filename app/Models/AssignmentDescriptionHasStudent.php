<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 08:36:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescriptionHasStudent
 * 
 * @property int $id
 * @property int $assignment_description_id
 * @property int $students_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class AssignmentDescriptionHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'assignment_description_id' => 'int',
		'students_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'assignment_description_id',
		'students_id',
		'status'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class);
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
