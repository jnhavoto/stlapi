<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 29 Apr 2018 16:56:48 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class WorkplaceToolsHasStudent
 * 
 * @property int $id
 * @property int $workplace_tools_id
 * @property int $students_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\WorkplaceTool $workplace_tool
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class WorkplaceToolsHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'workplace_tools_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'workplace_tools_id',
		'students_id'
	];

	public function workplace_tool()
	{
		return $this->belongsTo(\App\Models\WorkplaceTool::class, 'workplace_tools_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
