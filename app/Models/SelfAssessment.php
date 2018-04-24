<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SelfAssessment
 * 
 * @property int $id
 * @property int $questions_id
 * @property bool $response
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $students_courses_id
 * 
 * @property \App\Models\Question $question
 * @property \App\Models\StudentsCourse $students_course
 * @property \Illuminate\Database\Eloquent\Collection $questions
 *
 * @package App\Models
 */
class SelfAssessment extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'questions_id' => 'int',
		'response' => 'bool',
		'students_courses_id' => 'int'
	];

	protected $fillable = [
		'questions_id',
		'response',
		'students_courses_id'
	];

	public function question()
	{
		return $this->belongsTo(\App\Models\Question::class, 'questions_id');
	}

	public function students_course()
	{
		return $this->belongsTo(\App\Models\StudentsCourse::class, 'students_courses_id');
	}

	public function questions()
	{
		return $this->belongsToMany(\App\Models\Question::class, 'questions_self_assessments', 'self_assessments_id', 'questions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
