<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

class Calendar extends Eloquent
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'calendar';

    protected $fillable = [
        'eventname',
        'color',
    ];

    protected $dates = [
        'eventdate',
    ];
}
