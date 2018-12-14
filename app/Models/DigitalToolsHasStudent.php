<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DigitalToolsHasStudent
 * 
 * @property int $id
 * @property int $digital_tools_id
 * @property int $students_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\DigitalTool $digital_tool
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class DigitalToolsHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'digital_tools_id' => 'int',
		'students_id' => 'int'
	];

	protected $fillable = [
		'digital_tools_id',
		'students_id'
	];

	public function digital_tool()
	{
		return $this->belongsTo(\App\Models\DigitalTool::class, 'digital_tools_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
