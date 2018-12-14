<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Group
 * 
 * @property int $id
 * @property string $group_cod
 * @property string $group_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 * @property \Illuminate\Database\Eloquent\Collection $student_members
 *
 * @package App\Models
 */
class Group extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'group_cod',
		'group_name'
	];

	public function assignment_descriptions()
	{
		return $this->belongsToMany(\App\Models\AssignmentDescription::class, 'groups_assignment_descriptions', 'groups_id', 'assignment_descriptions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function student_members()
	{
		return $this->hasMany(\App\Models\StudentMember::class, 'groups_id');
	}
}
