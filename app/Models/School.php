<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class School
 * 
 * @property int $id
 * @property string $school_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $cities_id
 * 
 * @property \App\Models\City $city
 * @property \Illuminate\Database\Eloquent\Collection $students
 *
 * @package App\Models
 */
class School extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'cities_id' => 'int'
	];

	protected $fillable = [
		'school_name',
		'cities_id'
	];

	public function city()
	{
		return $this->belongsTo(\App\Models\City::class, 'cities_id');
	}

	public function students()
	{
		return $this->hasMany(\App\Models\Student::class, 'schools_id');
	}
}
