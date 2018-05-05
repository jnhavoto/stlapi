<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaTypeController extends ModelController
{

    public function __construct() {
        $this->object = new MediaType();
        $this->objectName = 'media_type';
        $this->objectNames = 'media_types';
        $this->relactionships = [];
    }

}