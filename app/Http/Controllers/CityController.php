<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends  ModelController
{

    public function __construct() {
    $this->object = new City();
    $this->objectName = 'city';
    $this->objectNames = 'cities';
    $this->relactionships = [];
}

}