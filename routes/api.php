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
Route::get('students', 'StudentController@getAllstudents'); //route to get all
Route::get('student/{id}', 'StudentController@getStudent'); //route to get a specific
Route::post('student', 'StudentController@store'); //route to store
Route::put('student/{id}', 'StudentController@update'); // route to update
Route::delete('student/{id}', 'StudentController@destroy'); //route to delete

/**
 * AssignmentDescriptions Routes
 */
Route::get('AssignmentDescriptions', 'AssignmentDescriptionController@getAllAssignmentDescriptions'); //route to get all
Route::get('AssignmentDescription/{id}', 'AssignmentDescriptionController@getAssignmentDescription');//route to get a specific
Route::post('AssignmentDescription', 'AssignmentDescriptionController@store'); //route to store
Route::put('AssignmentDescription/{id}', 'AssignmentDescriptionController@update'); // route to update
Route::delete('AssignmentDescription/{id}', 'AssignmentDescriptionController@destroy');//route to delete

/**
 * AssignmentSubmissions Routes
 */
Route::get('AssignmentSubmissions', 'AssignmentSubmissionController@getAllAssignmentSubmissions'); //route to get all
Route::get('AssignmentSubmission/{id}', 'AssignmentSubmissionController@getAssignmentDescription'); //route to get a specific
Route::post('AssignmentSubmission', 'AssignmentSubmissionController@store'); //route to store
Route::put('AssignmentSubmission/{id}', 'AssignmentSubmissionController@update'); // route to update
Route::delete('AssignmentSubmission/{id}', 'AssignmentSubmissionController@destroy'); //route to delete


/**
 * Cities Routes
 */
Route::get('cities', 'CityController@getAllCities'); //route to get all
Route::get('city/{id}', 'CityController@getCity'); //route to get a specific
Route::post('city', 'CityController@store'); //route to store
Route::put('city/{id}', 'CityController@update'); // route to update
Route::delete('city/{id}', 'CityController@destroy'); //route to delete

/**
 * AssignmentDescription Routes
 */
Route::get('assignment-descriptions', 'AssignmentDescriptionController@getAllAssignmentDescriptions'); //route to get all
Route::get('assignment-description/{id}', 'AssignmentDescriptionController@getAssignmentDescription'); //route to get a specific
Route::post('assignment-description', 'AssignmentDescriptionController@store'); //route to store
Route::put('assignment-description/{id}', 'AssignmentDescriptionController@update'); // route to update
Route::delete('assignment-description/{id}', 'AssignmentDescriptionController@destroy'); //route to delete

/**
 * Course Routes
 */
Route::get('courses', 'CourseController@getAllCourses'); //route to get all
Route::get('course/{id}', 'CourseController@getCourse'); //route to get a specific
Route::post('assignment-description', 'CourseController@store'); //route to store
Route::put('assignment-description/{id}', 'CourseController@update'); // route to update
Route::delete('assignment-description/{id}', 'CourseController@destroy'); //route to delete

/**
 * Department Routes
 */
Route::get('departments', 'DepartmentController@getAllDepartments'); //route to get all
Route::get('department/{id}', 'DepartmentController@getDepartment'); //route to get a specific
Route::post('department', 'DepartmentController@store'); //route to store
Route::put('department/{id}', 'DepartmentController@update'); // route to update
Route::delete('department/{id}', 'DepartmentController@destroy'); //route to delete

/**
 * Feedback Routes
 */
Route::get('feedbacks', 'FeedbackController@getAllFeedbacks'); //route to get all
Route::get('feedback/{id}', 'FeedbackController@getFeedback'); //route to get a specific
Route::post('feedback', 'FeedbackController@store'); //route to store
Route::put('feedback/{id}', 'FeedbackController@update'); // route to update
Route::delete('feedback/{id}', 'FeedbackController@destroy'); //route to delete




