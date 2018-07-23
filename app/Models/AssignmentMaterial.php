<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 14:08:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssignmentMaterial
 * 
 * @property int $id
 * @property string $description
 * @property string $file_name
 * @property string $path
 * @property int $assignment_description_id
 * 
 * @property \App\Models\AssignmentDescription $assignment_description
 *
 * @package App\Models
 */
class AssignmentMaterial extends Eloquent
{
	protected $table = 'assignment_material';
	public $timestamps = false;

	protected $casts = [
		'assignment_description_id' => 'int'
	];

	protected $fillable = [
		'description',
		'file_name',
		'path',
		'assignment_description_id'
	];

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class);
	}
}
