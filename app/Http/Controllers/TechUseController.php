<?php

namespace App\Http\Controllers;

use App\Models\TechUse;
use Illuminate\Http\Request;

class TechUseController extends ModelController
{

    public function __construct() {
        $this->object = new TechUse();
        $this->objectName = 'tech_use';
        $this->objectNames = 'tech_uses';
        $this->relactionships = [];
    }

}