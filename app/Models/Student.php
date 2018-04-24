<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Student
 * 
 * @property int $id
 * @property int $teaching_grade
 * @property int $years_as_teacher
 * @property int $technical_support
 * @property int $student_to_student_feedback
 * @property string $student_to_student_feedback_other
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $users_id
 * @property int $schools_id
 * @property int $cities_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\School $school
 * @property \App\Models\City $city
 * @property \Illuminate\Database\Eloquent\Collection $assignment_submissions
 * @property \Illuminate\Database\Eloquent\Collection $digital_tools
 * @property \Illuminate\Database\Eloquent\Collection $feedback_messages
 * @property \Illuminate\Database\Eloquent\Collection $feedback
 * @property \Illuminate\Database\Eloquent\Collection $student_members
 * @property \Illuminate\Database\Eloquent\Collection $student_notification_statuses
 * @property \Illuminate\Database\Eloquent\Collection $courses
 * @property \Illuminate\Database\Eloquent\Collection $subjects
 * @property \Illuminate\Database\Eloquent\Collection $tech_uses
 * @property \Illuminate\Database\Eloquent\Collection $work_methods
 * @property \Illuminate\Database\Eloquent\Collection $workplace_tools
 *
 * @package App\Models
 */
class Student extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'teaching_grade' => 'int',
		'years_as_teacher' => 'int',
		'technical_support' => 'int',
		'student_to_student_feedback' => 'int',
		'users_id' => 'int',
		'schools_id' => 'int',
		'cities_id' => 'int'
	];

	protected $fillable = [
		'teaching_grade',
		'years_as_teacher',
		'technical_support',
		'student_to_student_feedback',
		'student_to_student_feedback_other',
		'users_id',
		'schools_id',
		'cities_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}

	public function school()
	{
		return $this->belongsTo(\App\Models\School::class, 'schools_id');
	}

	public function city()
	{
		return $this->belongsTo(\App\Models\City::class, 'cities_id');
	}

	public function assignment_submissions()
	{
		return $this->hasMany(\App\Models\AssignmentSubmission::class, 'students_id');
	}

	public function digital_tools()
	{
		return $this->belongsToMany(\App\Models\DigitalTool::class, 'digital_tools_has_students', 'students_id', 'digital_tools_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function feedback_messages()
	{
		return $this->hasMany(\App\Models\FeedbackMessage::class, 'students_reciever');
	}

	public function feedback()
	{
		return $this->hasMany(\App\Models\Feedback::class, 'students_id');
	}

	public function student_members()
	{
		return $this->hasMany(\App\Models\StudentMember::class, 'students_id');
	}

	public function student_notification_statuses()
	{
		return $this->hasMany(\App\Models\StudentNotificationStatus::class, 'students_id');
	}

	public function courses()
	{
		return $this->belongsToMany(\App\Models\Course::class, 'students_courses', 'students_id', 'courses_id')
					->withPivot('id', 'start_date', 'end_date', 'status', 'deleted_at')
					->withTimestamps();
	}

	public function subjects()
	{
		return $this->belongsToMany(\App\Models\Subject::class, 'subjects_has_students', 'students_id', 'subjects_id')
					->withPivot('id');
	}

	public function tech_uses()
	{
		return $this->belongsToMany(\App\Models\TechUse::class, 'tech_use_has_students', 'students_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function work_methods()
	{
		return $this->belongsToMany(\App\Models\WorkMethod::class, 'work_methods_has_students', 'students_id', 'work_methods_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function workplace_tools()
	{
		return $this->belongsToMany(\App\Models\WorkplaceTool::class, 'workplace_tools_has_students', 'students_id', 'workplace_tools_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
