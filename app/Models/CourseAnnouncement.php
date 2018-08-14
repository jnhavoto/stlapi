<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Aug 2018 13:48:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CourseAnnouncement
 * 
 * @property int $id
 * @property int $courses_id
 * @property int $teacher_members_id
 * @property string $message
 * @property string $subject
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Course $course
 * @property \App\Models\TeacherMember $teacher_member
 *
 * @package App\Models
 */
class CourseAnnouncement extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'courses_id' => 'int',
		'teacher_members_id' => 'int'
	];

    protected $dates = [
        'date',
    ];
	protected $fillable = [
		'courses_id',
		'teacher_members_id',
		'message',
		'subject',
        'status',
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function teacher_member()
	{
		return $this->belongsTo(\App\Models\TeacherMember::class, 'teacher_members_id');
	}
}
