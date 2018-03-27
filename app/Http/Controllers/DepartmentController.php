<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    /**
     * Method to get all department
     */
    public function getAllDepartments()
    {
        $departments= Department::all();

        return response()->json(['departments'=>$departments],200);

    }

    /**
     * Method to get one specific department
     */
    public function getDepartment($id)
    {

    }


    /**
     * Method to store a department
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Method to update a department data
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Method to delete a department
     */
    public function destroy($id)
    {
        //
    }
}
