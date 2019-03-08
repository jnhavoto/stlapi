<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Announcement
 * 
 * @property int $id
 * @property int $courses_id
 * @property int $assignment_description_id
 * @property string $message
 * @property string $subject
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\Course $course
 * @property \Illuminate\Database\Eloquent\Collection $students
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 *
 * @package App\Models
 */
class Announcement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courses_id' => 'int',
		'assignment_description_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'courses_id',
		'assignment_description_id',
		'message',
		'subject',
		'status',
        'sender'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class);
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'announcements_has_students', 'announcements_id', 'students_id')
					->withPivot('id', 'status', 'deleted_at')
					->withTimestamps();
	}

	public function teachers()
	{
		return $this->belongsToMany(\App\Models\Teacher::class, 'announcements_has_teachers', 'announcements_idannouncement', 'teachers_id')
					->withPivot('id', 'status', 'deleted_at')
					->withTimestamps();
	}
}
