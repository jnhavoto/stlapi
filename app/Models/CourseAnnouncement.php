<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 13 Sep 2018 16:17:00 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CourseAnnouncement
 * 
 * @property int $id
 * @property int $courses_id
 * @property string $message
 * @property string $subject
 * @property int $status
 * @property \Carbon\Carbon $date
 * @property int $teachers_id
 * @property int $teacher_members_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\Teacher $teacher
 * @property \App\Models\TeacherMember $teacher_member
 * @property \Illuminate\Database\Eloquent\Collection $materials
 *
 * @package App\Models
 */
class CourseAnnouncement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courses_id' => 'int',
		'status' => 'int',
		'teachers_id' => 'int',
		'teacher_members_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'courses_id',
		'message',
		'subject',
		'status',
		'date',
		'teachers_id',
		'teacher_members_id'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}

	public function teacher_member()
	{
		return $this->belongsTo(\App\Models\TeacherMember::class, 'teacher_members_id');
	}

	public function materials()
	{
		return $this->hasMany(\App\Models\Material::class, 'course_announcements_id');
	}
}
