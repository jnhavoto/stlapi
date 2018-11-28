<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 08:36:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentSubmissionsMediaType
 * 
 * @property int $id
 * @property int $assignment_submissions_id
 * @property int $media_type_id
 * 
 * @property \App\Models\AssignmentSubmission $assignment_submission
 * @property \App\Models\MediaType $media_type
 *
 * @package App\Models
 */
class AssignmentSubmissionsMediaType extends Eloquent
{
	protected $table = 'assignment_submissions_media_type';
	public $timestamps = false;

	protected $casts = [
		'assignment_submissions_id' => 'int',
		'media_type_id' => 'int'
	];

	protected $fillable = [
		'assignment_submissions_id',
		'media_type_id'
	];

	public function assignment_submission()
	{
		return $this->belongsTo(\App\Models\AssignmentSubmission::class, 'assignment_submissions_id');
	}

	public function media_type()
	{
		return $this->belongsTo(\App\Models\MediaType::class);
	}
}
