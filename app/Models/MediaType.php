<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:18 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MediaType
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
class MediaType extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'media_type';

	protected $fillable = [
		'name'
	];

	public function assignment_submissions()
	{
		return $this->belongsToMany(\App\Models\AssignmentSubmission::class, 'assignment_submissions_media_type', 'media_type_id', 'assignment_submissions_id')
					->withPivot('id');
	}
}
