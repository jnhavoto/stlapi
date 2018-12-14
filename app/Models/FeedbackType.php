<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FeedbackType
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assignment_submissions
 *
 * @package App\Models
 */
class FeedbackType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'feedback_type';

	protected $fillable = [
		'name'
	];

	public function assignment_submissions()
	{
		return $this->belongsToMany(\App\Models\AssignmentSubmission::class, 'feedback_type_assignment_submissions', 'feedback_type_id', 'assignment_submissions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
