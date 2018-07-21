<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentTemplate
 * 
 * @property int $id
 * @property string $case
 * @property int $number
 * @property string $instructions
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 *
 * @package App\Models
 */
class AssignmentTemplate extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'assignment_template';

	protected $casts = [
		'number' => 'int'
	];

	protected $fillable = [
		'case',
		'number',
		'instructions'
	];

	public function assignment_descriptions()
	{
		return $this->hasMany(\App\Models\AssignmentDescription::class);
	}
}
