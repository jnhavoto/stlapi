<?php

use  \Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\Session;

Auth::routes();

//==============================================================
//Start Dashboard
//==============================================================

Route::get('/', function () {
	$user = \Illuminate\Support\Facades\Auth::user();
	return view('dashboard.index', ['user' => $user]);
})->middleware(['teacher']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//==============================================================
//End Dashboard
//==============================================================


//==============================================================
//Start Comunications
//==============================================================

Route::get('/contacts', 'TeacherController@listContacts')->middleware(['teacher']);

Route::get('/contact-details', function () {
	return view('communications.contact-details', ['user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);

//get Chats
Route::get('/chats', 'ChatController@getAllChats')->middleware(['teacher']);

//get Notifications
Route::get('/notifications', 'NotificationsController@getNotifications')->middleware(['teacher']);

//==============================================================
//End Comunications
//==============================================================


//==============================================================
//Start Design
//==============================================================

//get Courses
Route::get('/courses', 'TeacherController@getCourses')->middleware(['teacher']);

//get calendar
Route::get('/calendar', 'CalendarController@getCalendar')->middleware(['teacher']);

Route::get('/assignments', 'TeacherController@getAssignments')->middleware(['teacher']);

Route::post('/submit_assignment', 'TeacherController@submitAssignment')->middleware(['teacher']);

Route::post('/submit_course', 'TeacherController@submitCourse')->middleware(['teacher']);

Route::post('/assignment_details', 'TeacherController@submitCourse')->middleware(['teacher']);
//==============================================================
//End Design
//==============================================================

//==============================================================
//Start Monitoring
//==============================================================

//Individual course overview
Route::get('/course-overview/{id}','CourseController@courseOverview')->middleware(['teacher']);

//General courses overview
Route::get('/courses-overview','CourseController@coursesOverview')->middleware(['teacher']);

Route::get('/assignments-overview', 'TeacherController@getAssignmentsOverview')->middleware(['teacher']);

//Feedback overview
Route::get('/feedbacks-overview', 'TeacherController@getAllFeedbacks')->middleware(['teacher']);

Route::get('assignment-submissions', 'AssignmentSubmissionController@getAll')->middleware(['teacher']); //route to get all
Route::get('/submission-details', function () {
    return view('activities.submission-details', ['user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);
Route::get('/sub-details/{id}','AssignmentSubmissionController@subDetails')->middleware(['teacher']);
//==============================================================
//End Monitoring
//==============================================================

//==============================================================
//Start App Translation
//==============================================================

Route::get('locale', function () {
    return App::getLocale();
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::view('/test-translate', 'test-translate');

//==============================================================
//End App Translation
//==============================================================


