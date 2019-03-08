<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentDescriptionsHasTeacher
 * 
 * @property int $id
 * @property int $assignment_descriptions_id
 * @property int $teachers_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\Teacher $teacher
 *
 * @package App\Models
 */
class AssignmentDescriptionsHasTeacher extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'assignment_descriptions_id' => 'int',
		'teachers_id' => 'int'
	];

	protected $fillable = [
		'assignment_descriptions_id',
		'teachers_id'
	];


	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}
}
