<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Sep 2018 16:16:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentAnnouncement
 * 
 * @property int $id
 * @property string $message
 * @property string $subject
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $status
 * @property int $assignment_descriptions_id
 * @property int $teacher_members_id
 * @property int $teachers_id
 * @property \Carbon\Carbon $date
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\TeacherMember $teacher_member
 * @property \App\Models\Teacher $teacher
 * @property \Illuminate\Database\Eloquent\Collection $materials
 * @property \Illuminate\Database\Eloquent\Collection $student_announcements_statuses
 *
 * @package App\Models
 */
class AssignmentAnnouncement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'assignment_announcement';

	protected $casts = [
		'status' => 'int',
		'assignment_descriptions_id' => 'int',
		'teacher_members_id' => 'int',
		'teachers_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'message',
		'subject',
		'status',
		'assignment_descriptions_id',
		'teacher_members_id',
		'teachers_id',
		'date'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function teacher_member()
	{
		return $this->belongsTo(\App\Models\TeacherMember::class, 'teacher_members_id');
	}

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}

	public function materials()
	{
		return $this->hasMany(\App\Models\Material::class);
	}

	public function student_announcements_statuses()
	{
		return $this->hasMany(\App\Models\StudentAnnouncementsStatus::class, 'assignment_notifications_id');
	}
}
