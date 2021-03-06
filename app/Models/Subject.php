<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 May 2018 15:35:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Subject
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $students
 *
 * @package App\Models
 */
class Subject extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'subjects_has_students', 'subjects_id', 'students_id')
					->withPivot('id');
	}
}
