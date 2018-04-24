<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 24 Apr 2018 18:12:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $telephone
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $students
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 *
 * @package App\Models
 */
class User extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'telephone',
		'email',
		'password',
		'remember_token'
	];

	public function students()
	{
		return $this->hasMany(\App\Models\Student::class, 'users_id');
	}

	public function teachers()
	{
		return $this->hasMany(\App\Models\Teacher::class, 'users_id');
	}
}
