<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 01 May 2018 15:38:10 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Question
 * 
 * @property int $id
 * @property string $description
 * @property int $levels_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Level $level
 * @property \Illuminate\Database\Eloquent\Collection $self_assessments
 *
 * @package App\Models
 */
class Question extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'levels_id' => 'int'
	];

	protected $fillable = [
		'description',
		'levels_id'
	];

	public function level()
	{
		return $this->belongsTo(\App\Models\Level::class, 'levels_id');
	}

	public function self_assessments()
	{
		return $this->hasMany(\App\Models\SelfAssessment::class, 'questions_id');
	}
}
