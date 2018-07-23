<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Department
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $courses
 *
 * @package App\Models
 */
class Department extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'name'
	];

	public function courses()
	{
		return $this->hasMany(\App\Models\Course::class, 'departments_id');
	}
}
