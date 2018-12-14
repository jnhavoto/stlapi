<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FeedbacksTodo
 * 
 * @property int $id
 * @property int $status
 * @property int $students_id
 * @property int $assignment_submissions_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentSubmission $assignment_submission
 * @property \App\Models\Student $student
 * @property \Illuminate\Database\Eloquent\Collection $feedback
 *
 * @package App\Models
 */
class FeedbacksTodo extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'feedbacks_todo';

	protected $casts = [
		'status' => 'int',
		'students_id' => 'int',
		'assignment_submissions_id' => 'int'
	];

	protected $fillable = [
		'status',
		'students_id',
		'assignment_submissions_id'
	];

	public function assignment_submission()
	{
		return $this->belongsTo(\App\Models\AssignmentSubmission::class, 'assignment_submissions_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function feedback()
	{
		return $this->hasMany(\App\Models\Feedback::class, 'feedbacks_todo_idfeedbacks_todo');
	}
}
