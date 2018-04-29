<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentSubmissionsMediaType
 * 
 * @property int $assignment_submissions_id
 * @property int $media_type_id
 * @property int $id
 * 
 * @property \App\Models\AssignmentSubmission $assignment_submission
 * @property \App\Models\MediaType $media_type
 *
 * @package App\Models
 */
class AssignmentSubmissionsMediaType extends Eloquent
{
	protected $table = 'assignment_submissions_media_type';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'assignment_submissions_id' => 'int',
		'media_type_id' => 'int',
		'id' => 'int'
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
