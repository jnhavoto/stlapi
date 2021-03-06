<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FeedbackTypeAssignmentSubmission
 * 
 * @property int $id
 * @property int $feedback_type_id
 * @property int $assignment_submissions_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\AssignmentSubmission $assignment_submission
 * @property \App\Models\FeedbackType $feedback_type
 *
 * @package App\Models
 */
class FeedbackTypeAssignmentSubmission extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'feedback_type_id' => 'int',
		'assignment_submissions_id' => 'int'
	];

	protected $fillable = [
		'feedback_type_id',
		'assignment_submissions_id'
	];

	public function assignment_submission()
	{
		return $this->belongsTo(\App\Models\AssignmentSubmission::class, 'assignment_submissions_id');
	}

	public function feedback_type()
	{
		return $this->belongsTo(\App\Models\FeedbackType::class);
	}
}
