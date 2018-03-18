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


/**
 * Students Routes
 */
Route::get('students', 'StudentController@getAllstudents');
Route::get('student/{id}', 'StudentController@getStudent');
Route::post('student', 'StudentController@store');
Route::put('student/{id}', 'StudentController@update');
Route::delete('student/{id}', 'StudentController@destroy');








