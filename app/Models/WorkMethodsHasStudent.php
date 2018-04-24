<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkMethodsHasStudent
 * 
 * @property int $id
 * @property int $work_methods_id
 * @property int $students_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\WorkMethod $work_method
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class WorkMethodsHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'work_methods_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'work_methods_id',
		'students_id'
	];

	public function work_method()
	{
		return $this->belongsTo(\App\Models\WorkMethod::class, 'work_methods_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
