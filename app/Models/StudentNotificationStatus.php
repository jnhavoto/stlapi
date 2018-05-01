<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentNotificationStatus
 * 
 * @property int $students_id
 * @property int $assignment_notifications_id
 * @property int $id
 * 
 * @property \App\Models\Student $student
 * @property \App\Models\AssignmentAnnouncement $assignment_announcement
 *
 * @package App\Models
 */
class StudentNotificationStatus extends Eloquent
{
	protected $table = 'student_notification_status';
	public $timestamps = false;

	protected $casts = [
		'students_id' => 'int',
		'assignment_notifications_id' => 'int'
	];

	protected $fillable = [
		'students_id',
		'assignment_notifications_id'
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function assignment_announcement()
	{
		return $this->belongsTo(\App\Models\AssignmentAnnouncement::class, 'assignment_notifications_id');
	}
}
