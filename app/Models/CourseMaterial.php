<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CourseMaterial
 * 
 * @property int $id
 * @property string $description
 * @property string $file_name
 * @property string $path
 * @property int $courses_id
 * 
 * @property \App\Models\Course $course
 *
 * @package App\Models
 */
class CourseMaterial extends Eloquent
{
	protected $table = 'course_material';
	public $timestamps = false;

	protected $casts = [
		'courses_id' => 'int'
	];

	protected $fillable = [
		'description',
		'file_name',
		'path',
		'courses_id'
	];

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}
}
