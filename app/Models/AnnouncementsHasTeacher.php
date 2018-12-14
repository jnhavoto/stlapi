<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AnnouncementsHasTeacher
 * 
 * @property int $id
 * @property int $announcements_idannouncement
 * @property int $teachers_id
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Announcement $announcement
 * @property \App\Models\Teacher $teacher
 *
 * @package App\Models
 */
class AnnouncementsHasTeacher extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'announcements_idannouncement' => 'int',
		'teachers_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'announcements_idannouncement',
		'teachers_id',
		'status'
	];

	public function announcement()
	{
		return $this->belongsTo(\App\Models\Announcement::class, 'announcements_idannouncement');
	}

	public function teacher()
	{
		return $this->belongsTo(\App\Models\Teacher::class, 'teachers_id');
	}
}
