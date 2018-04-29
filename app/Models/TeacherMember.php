<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TeacherMember
 * 
 * @property int $id
 * @property int $group_teachers_id
 * @property int $teachers_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\GroupTeacher $group_teacher
 * @property \App\Models\Teacher $teacher
 * @property \Illuminate\Database\Eloquent\Collection $assignment_announcements
 *
 * @package App\Models
 */
class TeacherMember extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'group_teachers_id' => 'int',
		'teachers_id' => 'int'
	];

	protected $fillable = [
		'group_teachers_id',
		'teachers_id'
	];

	public function group_teacher()
	{
		return $this->belongsTo(\App\Models\GroupTeacher::class, 'group_teachers_id');
	}

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}

	public function assignment_announcements()
	{
		return $this->hasMany(\App\Models\AssignmentAnnouncement::class, 'teacher_members_id');
	}
}