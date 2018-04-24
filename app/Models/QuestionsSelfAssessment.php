<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class QuestionsSelfAssessment
 * 
 * @property int $id
 * @property int $questions_id
 * @property int $self_assessments_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Question $question
 * @property \App\Models\SelfAssessment $self_assessment
 *
 * @package App\Models
 */
class QuestionsSelfAssessment extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'questions_id' => 'int',
		'self_assessments_id' => 'int'
	];

	protected $fillable = [
		'questions_id',
		'self_assessments_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class, 'questions_id');
	}

	public function self_assessment()
	{
		return $this->belongsTo(\App\Models\SelfAssessment::class, 'self_assessments_id');
	}
}
