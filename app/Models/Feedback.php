<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property string $goal
 * @property string $message
 * @property string $advice
 * @property string $comment
 * @property \Carbon\Carbon $feedback_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $students_id
 * @property int $assignment_submissions_id
 * @property int $status
 * 
 * @property \App\Models\Student $student
 * @property \App\Models\AssignmentSubmission $assignment_submission
 * @property \Illuminate\Database\Eloquent\Collection $rating_feedbacks
 *
 * @package App\Models
 */
class Feedback extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'feedbacks';

	protected $casts = [
		'students_id' => 'int',
		'assignment_submissions_id' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'feedback_date'
	];

	protected $fillable = [
		'goal',
		'message',
		'advice',
		'comment',
		'feedback_date',
		'students_id',
		'assignment_submissions_id',
		'status'
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function assignment_submission()
	{
		return $this->belongsTo(\App\Models\AssignmentSubmission::class, 'assignment_submissions_id');
	}

	public function rating_feedbacks()
	{
		return $this->hasMany(\App\Models\RatingFeedback::class, 'feedbacks_id');
	}
}
