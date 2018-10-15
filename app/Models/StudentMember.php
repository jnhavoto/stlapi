<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentMember
 * 
 * @property int $id
 * @property int $groups_id
 * @property int $students_id
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Group $group
 * @property \App\Models\Student $student
 * @property \Illuminate\Database\Eloquent\Collection $group_messages
 *
 * @package App\Models
 */
class StudentMember extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'groups_id' => 'int',
		'students_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'groups_id',
		'students_id',
		'status'
	];

	protected $with = ["student"];

	public function group()
	{
		return $this->belongsTo(\App\Models\Group::class, 'groups_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function group_messages()
	{
		return $this->hasMany(\App\Models\GroupMessage::class, 'member_id');
	}
}
