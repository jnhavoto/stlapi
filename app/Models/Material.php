<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Material
 * 
 * @property int $id
 * @property string $file_name
 * @property string $path
 * @property int $courses_id
 * @property int $course_announcements_id
 * @property int $assignment_announcement_id
 * @property int $assignment_description_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\AssignmentAnnouncement $assignment_announcement
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \App\Models\CourseAnnouncement $course_announcement
 *
 * @package App\Models
 */
class Material extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courses_id' => 'int',
		'course_announcements_id' => 'int',
		'assignment_announcement_id' => 'int',
		'assignment_description_id' => 'int'
	];

	protected $fillable = [
		'file_name',
		'path',
		'courses_id',
		'course_announcements_id',
		'assignment_announcement_id',
		'assignment_description_id'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function assignment_announcement()
	{
		return $this->belongsTo(\App\Models\AssignmentAnnouncement::class);
	}

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class);
	}

	public function course_announcement()
	{
		return $this->belongsTo(\App\Models\CourseAnnouncement::class, 'course_announcements_id');
	}
}
