<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GroupsAssignmentDescription
 * 
 * @property int $id
 * @property int $groups_id
 * @property int $assignment_descriptions_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Group $group
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \Illuminate\Database\Eloquent\Collection $group_messages
 *
 * @package App\Models
 */
class GroupsAssignmentDescription extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'groups_id' => 'int',
		'assignment_descriptions_id' => 'int'
	];

	protected $fillable = [
		'groups_id',
		'assignment_descriptions_id'
	];

	public function group()
	{
		return $this->belongsTo(\App\Models\Group::class, 'groups_id');
	}

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function group_messages()
	{
		return $this->hasMany(\App\Models\GroupMessage::class, 'groups_assignment_descriptions_id');
	}
}
