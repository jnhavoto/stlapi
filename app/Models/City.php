<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $id
 * @property string $city_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $schools
 * @property \Illuminate\Database\Eloquent\Collection $students
 *
 * @package App\Models
 */
class City extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'city_name'
	];

	public function schools()
	{
		return $this->hasMany(\App\Models\School::class, 'cities_id');
	}

	public function students()
	{
		return $this->hasMany(\App\Models\Student::class, 'cities_id');
	}
}
