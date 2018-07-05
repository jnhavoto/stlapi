<?php

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
Route::get('/courses', 'TeacherController@getAllCourses')->middleware(['teacher']);

Route::get('/assignments', 'TeacherController@getAllAssignments')->middleware(['teacher']);

Route::post('/submit_assignment', 'TeacherController@submitAssignment')->middleware(['teacher']);




