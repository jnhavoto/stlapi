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


/**
 * FeedbackStudent Routes
 */
Route::get('feedback-students', 'FeedbackStudentController@getAllFeedbackStudents'); //route to get all
Route::get('feedback-student/{id}', 'FeedbackStudentController@getFeedbackStudent'); //route to get a specific
Route::post('feedback-student', 'FeedbackStudentController@store'); //route to store
Route::put('feedback-student/{id}', 'FeedbackStudentController@update'); // route to update
Route::delete('feedback-student/{id}', 'FeedbackStudentController@destroy'); //route to delete


/**
 * GroupAssignment Routes
 */
Route::get('group-assignments', 'GroupAssignmentController@getAllGroupAssignments'); //route to get all
Route::get('group-assignment/{id}', 'GroupAssignmentController@getGroupAssignment'); //route to get a specific
Route::post('group-assignment', 'GroupAssignmentController@store'); //route to store
Route::put('group-assignment/{id}', 'GroupAssignmentController@update'); // route to update
Route::delete('group-assignment/{id}', 'GroupAssignmentController@destroy'); //route to delete

/**
 * GroupHistory Routes
 */
Route::get('group-histories', 'GroupHistoryController@getAllGroupHistories'); //route to get all
Route::get('group-history/{id}', 'GroupHistoryController@getGroupHistory'); //route to get a specific
Route::post('group-history', 'GroupHistoryController@store'); //route to store
Route::put('group-history/{id}', 'GroupHistoryController@update'); // route to update
Route::delete('group-history/{id}', 'GroupHistoryController@destroy'); //route to delete


/**
 * RatingFeedback Routes
 */
Route::get('rating-feedbacks', 'RatingFeedbackController@getAllRatingFeedbacks'); //route to get all
Route::get('rating-feedback/{id}', 'RatingFeedbackController@getRatingFeedback'); //route to get a specific
Route::post('rating-feedback', 'RatingFeedbackController@store'); //route to store
Route::put('rating-feedback/{id}', 'RatingFeedbackController@update'); // route to update
Route::delete('rating-feedback/{id}', 'RatingFeedbackController@destroy'); //route to delete


/**
 * Schools Routes
 */
Route::get('schools', 'SchoolController@getAllSchools'); //route to get all
Route::get('school/{id}', 'SchoolController@getSchool'); //route to get a specific
Route::post('school', 'SchoolController@store'); //route to store
Route::put('school/{id}', 'SchoolController@update'); // route to update
Route::delete('school/{id}', 'SchoolController@destroy'); //route to delete

/**
 * SelfAssessmentAssignment Routes
 */
Route::get('self-assessment-assignments', 'SelfAssessmentAssignmentController@getAllSelfAssessmentAssignments'); //route to get all
Route::get('self-assessment-assignment/{id}', 'SelfAssessmentAssignmentController@getSelfAssessmentAssignment'); //route to get a specific
Route::post('self-assessment-assignment', 'SelfAssessmentAssignmentController@store'); //route to store
Route::put('self-assessment-assignment/{id}', 'SelfAssessmentAssignmentController@update'); // route to update
Route::delete('self-assessment-assignment/{id}', 'SelfAssessmentAssignmentController@destroy'); //route to delete


/**
 * SelfAssessment Routes
 */
Route::get('self-assessments', 'SelfAssessmentController@getAllSelfAssessment'); //route to get all
Route::get('self-assessment/{id}', 'SelfAssessmentController@getSelfAssessment'); //route to get a specific
Route::post('self-assessment', 'SelfAssessmentController@store'); //route to store
Route::put('self-assessment/{id}', 'SelfAssessmentController@update'); // route to update
Route::delete('self-assessment/{id}', 'SelfAssessmentController@destroy'); //route to delete


/**
 * Teacher Routes
 */
Route::get('teachers', 'TeacherController@getAllSelfAssessment'); //route to get all
Route::get('teacher/{id}', 'TeacherController@getSelfAssessment'); //route to get a specific
Route::post('teacher', 'TeacherController@store'); //route to store
Route::put('teacher/{id}', 'TeacherController@update'); // route to update
Route::delete('teacher/{id}', 'TeacherController@destroy'); //route to delete


/**
 * TeacherCourse Routes
 */
Route::get('teacher-courses', 'TeacherCourseController@getAllTeacherCourse'); //route to get all
Route::get('teacher-course/{id}', 'TeacherCourseController@getTeacherCourse'); //route to get a specific
Route::post('teacher-course', 'TeacherCourseController@store'); //route to store
Route::put('teacher-course/{id}', 'TeacherCourseController@update'); // route to update
Route::delete('teacher-course/{id}', 'TeacherCourseController@destroy'); //route to delete




