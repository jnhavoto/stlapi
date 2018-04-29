<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RatingFeedback
 * 
 * @property int $id
 * @property string $goal
 * @property int $timing
 * @property string $message
 * @property string $advice
 * @property string $comment
 * @property \Carbon\Carbon $feedback_rating_date
 * @property int $feedbacks_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Feedback $feedback
 *
 * @package App\Models
 */
class RatingFeedback extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'timing' => 'int',
		'feedbacks_id' => 'int'
	];

	protected $dates = [
		'feedback_rating_date'
	];

	protected $fillable = [
		'goal',
		'timing',
		'message',
		'advice',
		'comment',
		'feedback_rating_date',
		'feedbacks_id'
	];

	public function feedback()
	{
		return $this->belongsTo(\App\Models\Feedback::class, 'feedbacks_id');
	}
}
