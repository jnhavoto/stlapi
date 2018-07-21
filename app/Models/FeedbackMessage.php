<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FeedbackMessage
 * 
 * @property int $students_sender
 * @property int $students_reciever
 * @property int $id
 * @property string $mensagem
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class FeedbackMessage extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'students_sender' => 'int',
		'students_reciever' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'students_sender',
		'students_reciever',
		'mensagem',
		'status'
	];

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class, 'students_reciever');
	}
}
