<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends ModelController
{
    //
    public function __construct()
    {
        $this->object = new Material();
        $this->objectName = 'material';
        $this->objectNames = 'materials';
        $this->relactionships = [];
    }

    public function getAssignmentMaterial($assign_id){
        $material = Material::where('assignment_description_id',$assign_id)->get();
    return response()->json(['assignmentmaterial'=>$material]);
}


}
