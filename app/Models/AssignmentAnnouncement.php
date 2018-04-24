<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentAnnouncement
 * 
 * @property int $assignment_descriptions_id
 * @property int $teacher_members_id
 * @property int $id
 * @property string $message
 * @property string $subject
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\TeacherMember $teacher_member
 * @property \Illuminate\Database\Eloquent\Collection $student_notification_statuses
 *
 * @package App\Models
 */
class AssignmentAnnouncement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'assignment_announcement';

	protected $casts = [
		'assignment_descriptions_id' => 'int',
		'teacher_members_id' => 'int'
	];

	protected $fillable = [
		'assignment_descriptions_id',
		'teacher_members_id',
		'message',
		'subject'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function teacher_member()
	{
		return $this->belongsTo(\App\Models\TeacherMember::class, 'teacher_members_id');
	}

	public function student_notification_statuses()
	{
		return $this->hasMany(\App\Models\StudentNotificationStatus::class, 'assignment_notifications_id');
	}
}
