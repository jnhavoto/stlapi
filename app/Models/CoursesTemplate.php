<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CoursesTemplate
 * 
 * @property int $id
 * @property string $name
 * @property string $course_content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courses
 *
 * @package App\Models
 */
class CoursesTemplate extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'courses_template';

	protected $fillable = [
		'name',
		'course_content'
	];

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class);
	}
}
