<?php

namespace App\Models;;

use Reliese\Database\Eloquent\Model as Eloquent;

class UserType extends Eloquent
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'users_id');
    }
}
