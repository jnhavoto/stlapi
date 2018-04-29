<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkplaceTool
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
class WorkplaceTool extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'workplace_tools_has_students', 'workplace_tools_id', 'students_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}
}
