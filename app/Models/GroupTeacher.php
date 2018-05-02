<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GroupTeacher
 * 
 * @property int $id
 * @property string $group_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 * @property \Illuminate\Database\Eloquent\Collection $teacher_members
 *
 * @package App\Models
 */
class GroupTeacher extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'group_name'
	];

	public function assignment_descriptions()
	{
		return $this->hasMany(\App\Models\AssignmentDescription::class, 'group_teachers_id');
	}

	public function teacher_members()
	{
		return $this->hasMany(\App\Models\TeacherMember::class, 'group_teachers_id');
	}
}
