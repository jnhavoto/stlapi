<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TechUseHasStudent
 * 
 * @property int $id
 * @property int $tech_use_id
 * @property int $students_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\TechUse $tech_use
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class TechUseHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'tech_use_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'tech_use_id',
		'students_id'
	];

	public function tech_use()
	{
		return $this->belongsTo(\App\Models\TechUse::class);
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}