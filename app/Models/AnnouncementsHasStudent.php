<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 28 Nov 2018 08:36:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AnnouncementsHasStudent
 * 
 * @property int $id
 * @property int $announcements_id
 * @property int $students_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Announcement $announcement
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class AnnouncementsHasStudent extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'announcements_id' => 'int',
		'students_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'announcements_id',
		'students_id',
		'status'
	];

	public function announcement()
	{
		return $this->belongsTo(\App\Models\Announcement::class, 'announcements_id');
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_id');
	}
}
