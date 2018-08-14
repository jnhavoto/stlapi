<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentAnnouncementsStatus
 * 
 * @property int $id
 * @property int $students_id
 * @property int $assignment_notifications_id
 * @property int $status
 * 
 * @property \App\Models\Student $student
 * @property \App\Models\AssignmentAnnouncement $assignment_announcement
 *
 * @package App\Models
 */
class StudentAnnouncementsStatus extends Eloquent
{
	protected $table = 'student_announcements_status';
	public $timestamps = false;

	protected $casts = [
		'students_id' => 'int',
		'assignment_notifications_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'students_id',
		'assignment_notifications_id',
		'status'
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
