<?php

namespace App\Http\Controllers;

use App\Models\AssignmentDescription;
use Illuminate\Http\Request;

class AssignmentDescriptionController extends ModelController
{

    public function __construct() {
        $this->objecto = new AssignmentDescription();
        $this->nomeObjecto = 'assignment_description';
        $this->nomeObjectos = 'assignment_description';
        $this->relacionados = [];
    }


}
