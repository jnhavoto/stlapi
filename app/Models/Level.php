<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Level
 * 
 * @property int $id
 * @property int $level_number
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $questions
 *
 * @package App\Models
 */
class Level extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'level_number' => 'int'
	];

	protected $fillable = [
		'level_number'
	];

	public function questions()
	{
		return $this->hasMany(\App\Models\Question::class, 'levels_id');
	}
}
