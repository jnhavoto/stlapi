<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 08 Dec 2018 11:58:13 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Calendar
 * 
 * @property int $id
 * @property string $eventname
 * @property \Carbon\Carbon $event_startdate
 * @property string $event_enddate
 * @property string $color
 * @property int $users_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Calendar extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'calendar';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $dates = [
		'event_startdate'
	];

	protected $fillable = [
		'eventname',
		'event_startdate',
		'event_enddate',
		'color',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}
}
