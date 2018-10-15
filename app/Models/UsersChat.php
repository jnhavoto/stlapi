<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Aug 2018 13:52:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UsersChat
 * 
 * @property int $id
 * @property string $message
 * @property string $subject
 * @property int $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $courses_id
 * @property int $assignment_description_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Course $course
 * @property \App\Models\AssignmentDescription $assignment_description
 *
 * @package App\Models
 */
class UsersChat extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'status' => 'int',
		'sender_id' => 'int',
		'receiver_id' => 'int',
		'courses_id' => 'int',
		'assignment_description_id' => 'int'
	];

	protected $fillable = [
		'message',
		'subject',
		'status',
		'sender_id',
		'receiver_id',
		'courses_id',
		'assignment_description_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'receiver_id');
	}

	public function course()
	{
		return $this->belongsTo(\App\Models\Course::class, 'courses_id');
	}

	public function assignment_description()
	{
		return $this->belongsTo(\App\Models\AssignmentDescription::class);
	}
}
