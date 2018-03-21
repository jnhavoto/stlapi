<?php

namespace App\Models;


class AssignmentNotifications
{
    protected $primaryKey='id';

    protected $table = 'assignment_notifications';

    protected $fillable = [
        'message', 'status'
    ];

}