<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkMethod
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
class WorkMethod extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'work_methods_has_students', 'work_methods_id', 'students_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
