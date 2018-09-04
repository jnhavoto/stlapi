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

Route::get('/contact-details/{id}', function ($id) {
	return view('communications.contact-details', ['user' => \App\User::find($id)]);
})->middleware(['teacher']);

Route::get('/contact-details-other/{id}', function ($id) {
    return view('communications.contact-details-other', ['user' => \App\User::find($id)]);
})->middleware(['teacher']);

//get Chats
Route::get('/chats', 'ChatController@getAllChats')->middleware(['teacher']);

//get Notifications
//Route::get('/notifications', 'NotificationsController@getNotifications')->middleware(['teacher']);

Route::get('/announcements', 'AssignmentAnnouncementController@getAnnouncements')->middleware(['teacher']);
Route::get('/announcements-details/{id}', 'AssignmentAnnouncementController@getAnnouncementDetails')->middleware(['teacher']);
/* Route::get('announcdetails/{announcID}/types/{type}', 
    ['as'=> 'announcements-details', 
    'uses' =>'AssignmentAnnouncementController@getAnnouncementDetails'])->middleware(['teacher']); */
Route::get('/announcements/inbox', 'AssignmentAnnouncementController@getInboxAnnouncements')->middleware(['teacher']);
Route::get('/announcements/sent', 'AssignmentAnnouncementController@getSentAnnouncements')->middleware(['teacher']);
Route::get('/announcements/draft', 'AssignmentAnnouncementController@getDraftAnnouncements')->middleware(['teacher']);


//==============================================================
//End Comunications
//==============================================================
//delete a student
Route::get('/update-student/{id}', 'StudentController@updateStudent')->middleware(['teacher']);

//delete a teacher
Route::get('/update-teacher/{id}', 'TeacherController@updateTeacher')->middleware(['teacher']);

//==============================================================
//Start Design
//==============================================================

//get all Courses
Route::get('/courses', 'CourseController@getCourses')->middleware(['teacher']);


Route::get('/instructors/{id}', 'CourseController@getInstructorsByCourseId')->middleware(['teacher']);
//get members of a course
//Route::get('/courses/{id}', 'TeacherController@getCourseMembers')->middleware(['teacher']);

//get all instructors
Route::get('/instructors', 'CourseController@getInstructors')->middleware(['teacher']);

Route::get('/course-details', 'CourseController@getCourseDetails')->middleware(['teacher']);

//course details by id
Route::get('/course-details/{id}', 'CourseController@getCourseDetails')->middleware(['teacher']);
//get calendar

Route::post('/submit_course', 'CourseController@submitCourse')->middleware(['teacher']);

//update course
Route::post('/update_course', 'CourseController@updateCourse')->middleware(['teacher']);

Route::get('/update_course/{id}', 'CourseController@updateCourseNew')->middleware(['teacher'])->name('updatecourse');
Route::post('/updateCourse/{id}', 'CourseController@updateCourseById')->middleware(['teacher'])->name('update_Course');
//delete a course
Route::post('/delete-course', 'CourseController@deleteCourse')->middleware(['teacher']);

//Individual course overview
Route::get('/coursedesign-overview/{id}','CourseController@courseDesignOverview')->middleware(['teacher']);


//ASSIGNMENTS
Route::get('/assignments', 'AssignmentDescriptionController@getAssignments')->middleware(['teacher']);

//get course template
Route::get('/assignment-templates/{id}', 'AssignmentDescriptionController@getAssignmentTemplates')->middleware(['teacher']);

Route::post('/create_assignment', 'AssignmentDescriptionController@createAssignment')->middleware(['teacher']);

Route::post('/create_assignmentFromTemplate', 'AssignmentDescriptionController@createAssignmentFromTemplate')
    ->middleware(['teacher']);

//create assignment From Course Overview
Route::post('/create_assignmentFromCourseOverview', 'AssignmentDescriptionController@createAssignmentFromCourseOverview')->middleware(['teacher']);

//delete an assignment
Route::post('/delete-assignment', 'AssignmentDescriptionController@deleteAssignment')->middleware(['teacher']);

//update assignment
Route::post('/update_assignment', 'AssignmentDescriptionController@updateAssignment')->middleware(['teacher']);

//
Route::get('/update_assignment/{id}','AssignmentDescriptionController@updateAssignment')->middleware(['teacher']);

//update assignment by id
Route::post('/update_assignment/{course}', 'AssignmentDescriptionController@updateAssignmentByID')->middleware(['teacher']);

Route::post('/assignment_details', 'TeacherController@submitCourse')->middleware(['teacher']);




//CALENDAR
Route::get('/calendar', 'CalendarController@getCalendar')->middleware(['teacher']);

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





