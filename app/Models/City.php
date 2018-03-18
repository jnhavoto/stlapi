<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey='id';

    protected $table = 'cities';

    protected $fillable = [
        'city_name'
    ];
}
