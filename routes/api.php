<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::resource('user/{id}','UserController');
Route::resource('student/{id}','StudentController');
/*Route::get('student/{id}',function($id){
    $student=DB::table('students')
        ->join('cities', 'students.city_id', '=', 'cities.city_id')
        ->join('schools', 'students.school_id', '=', 'schools.school_id')
        ->join('users', 'students.user_id', '=', 'users.user_id')
        ->select('students.*','users.first_name','users.last_name','users.email','users.telephone','cities.city_name','schools.school_name')
        ->where('student_id','=',$id)
        ->get()->toJson();
    return response()->header('Content-Type', 'application/json');
}
*/






