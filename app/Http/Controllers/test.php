<?php
/**
 * Created by PhpStorm.
 * User: jno
 * Date: 20/06/2018
 * Time: 16:17
 */

namespace App\Http\Controllers;


use App\Models\Student;

class test
{


    function index(){


        $students = Student::all();

        return view('assigments.index', ['students'=> $students]);

    }

}