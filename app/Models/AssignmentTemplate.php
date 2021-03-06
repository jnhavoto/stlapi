<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
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
}
