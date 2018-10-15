<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GroupMessage
 * 
 * @property int $id
 * @property int $member_id
 * @property int $groups_assignment_descriptions_id
 * @property string $mensagem
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\StudentMember $student_member
 * @property \App\Models\GroupsAssignmentDescription $groups_assignment_description
 *
 * @package App\Models
 */
class GroupMessage extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'member_id' => 'int',
		'groups_assignment_descriptions_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'member_id',
		'groups_assignment_descriptions_id',
		'mensagem',
		'status'
	];

	public function student_member()
	{
		return $this->belongsTo(\App\Models\StudentMember::class, 'member_id');
	}

	public function groups_assignment_description()
	{
		return $this->belongsTo(\App\Models\GroupsAssignmentDescription::class, 'groups_assignment_descriptions_id');
	}
}
