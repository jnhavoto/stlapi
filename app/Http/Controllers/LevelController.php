<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends ModelController
{

    public function __construct() {
        $this->object = new Level();
        $this->objectName = 'level';
        $this->objectNames = 'levels';
        $this->relactionships = [];
    }

}