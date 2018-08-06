<?php

use  \Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\Session;

Auth::routes();

Route::get('/', function () {
	$user = \Illuminate\Support\Facades\Auth::user();
	return view('initial-page.index', ['user' => $user]);
})->middleware(['teacher']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('initial-page.index');

//Route::get('/calendar', function () {
//	return view('communications.calendar');
//})->middleware(['auth2', 'teacher']);

// Route::get('/home', function () {
//     return view('test');
// });

//Route::get('/contacts', function () {
//    return view('communications.contacts');
//});

Route::get('/contacts', 'TeacherController@listContacts')->middleware(['teacher']);

Route::get('/contact-details', function () {
	return view('communications.contact-details', ['user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);
//    ->middleware(['auth2','teacher']);
//get Chats
Route::get('/chats', 'ChatController@getAllChats')->middleware(['teacher']);
//get calendar
Route::get('/calendar', 'CalendarController@getCalendar')->middleware(['teacher']);
//get Notifications
Route::get('/notifications', 'NotificationsController@getNotifications')->middleware(['teacher']);

//get Courses
Route::get('/courses', 'TeacherController@getCourses')->middleware(['teacher']);

//Route::get('/assignments', 'TeacherController@getTeacherAssignments')->middleware(['teacher']);
//Route::get('/assignments', 'TeacherController@getAllAssignments')->middleware(['teacher']);
//calling all asignment and teacher assignments
Route::get('/assignments', 'TeacherController@getAssignments')->middleware(['teacher']);

Route::get('/assignment_submissions', 'TeacherController@getAllAssignmentSubmissions')->middleware(['teacher']);

Route::post('/submit_assignment', 'TeacherController@submitAssignment')->middleware(['teacher']);

Route::post('/submit_course', 'TeacherController@submitCourse')->middleware(['teacher']);

Route::post('/assignment_details', 'TeacherController@submitCourse')->middleware(['teacher']);

Route::get('assignment-submissions', 'AssignmentSubmissionController@getAll')->middleware(['teacher']); //route to get all

Route::get('/submission-details', function () {
    return view('activities.submission-details', ['user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);


Route::get('/sub-details/{id}','AssignmentSubmissionController@subDetails');

Route::get('/course-overview/{id}','CourseController@courseOverview');


//Route::get('/feedbacks', 'FeedbackController@getAll')->middleware(['teacher']);; //route to get all
//Route::get('/feedbacks', 'FeedbackController@getAll')->middleware(['teacher']);; //route to get all

Route::get('/feedbacks', 'TeacherController@getAllFeedbacks')->middleware(['teacher']);




//Translates Tests

Route::get('locale', function () {
    return App::getLocale();
});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::view('/test-translate', 'test-translate');



