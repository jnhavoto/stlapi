<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentSubmission
 * 
 * @property int $id
 * @property string $area
 * @property int $grade
 * @property int $number_of_students
 * @property \Carbon\Carbon $start_date_of_lecture
 * @property \Carbon\Carbon $end_date_of_lecture
 * @property string $purpose
 * @property string $curriculum_requirement
 * @property string $preview_text
 * @property string $preview_check
 * @property bool $inspiration_choiche
 * @property string $inspiration_text
 * @property string $text_types
 * @property string $task_formulation
 * @property string $feedback_text
 * @property string $assessment
 * @property int $analysis_measure
 * @property string $analysis_text
 * @property string $good_experience
 * @property string $bad_experience
 * @property string $learned_consequence
 * @property string $next_goal
 * @property \Carbon\Carbon $submission_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $students_id
 * @property int $assignment_descriptions_id
 * 
 * @property \App\Models\Student $student
 * @property \App\Models\AssignmentDescription $assignment_description
 * @property \Illuminate\Database\Eloquent\Collection $media_types
 * @property \Illuminate\Database\Eloquent\Collection $feedback_types
 * @property \Illuminate\Database\Eloquent\Collection $feedback
 *
 * @package App\Models
 */
class AssignmentSubmission extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'grade' => 'int',
		'number_of_students' => 'int',
		'inspiration_choiche' => 'bool',
		'analysis_measure' => 'int',
		'students_id' => 'int',
		'assignment_descriptions_id' => 'int'
	];

	protected $dates = [
		'start_date_of_lecture',
		'end_date_of_lecture',
		'submission_date'
	];

	protected $fillable = [
		'area',
		'grade',
		'number_of_students',
		'start_date_of_lecture',
		'end_date_of_lecture',
		'purpose',
		'curriculum_requirement',
		'preview_text',
		'preview_check',
		'inspiration_choiche',
		'inspiration_text',
		'text_types',
		'task_formulation',
		'feedback_text',
		'assessment',
		'analysis_measure',
		'analysis_text',
		'good_experience',
		'bad_experience',
		'learned_consequence',
		'next_goal',
		'submission_date',
		'students_id',
		'assignment_descriptions_id'
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class, 'assignment_descriptions_id');
	}

	public function media_types()
	{
		return $this->belongsToMany(\App\Models\MediaType::class, 'assignment_submissions_media_type', 'assignment_submissions_id')
					->withPivot('id');
	}

	public function feedback_types()
	{
		return $this->belongsToMany(\App\Models\FeedbackType::class, 'feedback_type_assignment_submissions', 'assignment_submissions_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

	public function feedback()
	{
		return $this->hasMany(\App\Models\Feedback::class, 'assignment_submissions_id');
	}
}
