<?php

namespace App\Models;


class FeedbackMessages
{
    protected $primaryKey='id';

    protected $table = 'assignment_notifications';

    protected $fillable = [
        'message', 'status'
    ];

}