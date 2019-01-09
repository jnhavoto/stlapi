<?php

use  \Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\Session;

Auth::routes();

//==============================================================
//Start Dashboard
//==============================================================

//Route::get('/', function () {
//	$user = \Illuminate\Support\Facades\Auth::user();
//	return view('dashboard.index', ['user' => $user]);
//})->middleware(['teacher']);

Auth::routes();

Route::get('/', 'HomeController@index')->middleware(['teacher']);

Route::get('/admin', 'HomeController@admin_index')->middleware(['admin']);

//update profile
Route::post('/update-profile', 'HomeController@updateProfile')->middleware(['teacher']);

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('/save-coursefiles', 'CourseController@saveFiles');

Route::post('/save-assignfiles', 'AssignmentDescriptionController@saveFiles');
//==============================================================
//End Dashboard
//==============================================================


//==============================================================
//Start Comunications
//==============================================================

Route::get('/contacts', 'TeacherController@listContacts')->middleware(['teacher']);

Route::get('/admin/users', 'TeacherController@admin_listContacts')->middleware(['admin']);

Route::get('/user-details/{id}', function ($id) {
	return view('communications.user-details', ['userdata' => \App\User::find($id), 'user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);


Route::get('/contact-details-other/{id}', function ($id) {
    return view('communications.contact-details-other', ['user' => \App\User::find($id)]);
})->middleware(['teacher']);

Route::post('/save-announcfiles', 'AssignmentAnnouncementController@saveFiles');

//get Chats
Route::get('/chats', 'ChatController@getAllChats')->middleware(['teacher']);

//get Notifications
//Route::get('/notifications', 'NotificationsController@getNotifications')->middleware(['teacher']);

//Get Anouncements
Route::get('/announcements', 'AnnouncementsController@getAnnouncements')->middleware(['teacher']);
//Get Anouncements
Route::get('/announcements-new', 'AnnouncementsController@getAnnouncements')->middleware(['teacher']);

//Get Anoumcements Inbox
Route::get('/announcements-inbox', 'AnnouncementsController@getAnnouncementsInbox')->middleware(['teacher']);

//Get Anoumcements Outbox
Route::get('/announcements-outbox', 'AnnouncementsController@getAnnouncementsOutbox')->middleware(['teacher']);

//Get Anoumcements Outbox
Route::get('/announcements-draft', 'AnnouncementsController@getAnnouncementsDraft')->middleware(['teacher']);


Route::get('/announcements-details/{id}', 'AssignmentAnnouncementController@getAnnouncementDetails')->middleware(['teacher']);
/* Route::get('announcdetails/{announcID}/types/{type}', 
    ['as'=> 'announcements-details', 
    'uses' =>'AssignmentAnnouncementController@getAnnouncementDetails'])->middleware(['teacher']); */
Route::get('/announcements/inbox', 'AssignmentAnnouncementController@getInboxAnnouncements')->middleware(['teacher']);
Route::get('/announcements/sent', 'AssignmentAnnouncementController@getSentAnnouncements')->middleware(['teacher']);
Route::get('/announcements/draft', 'AssignmentAnnouncementController@getDraftAnnouncements')->middleware(['teacher']);
Route::get('/announcements/compose', 'AssignmentAnnouncementController@composeAnnouncements')->middleware(['teacher']);
Route::post('/submit_announcement', 'AssignmentAnnouncementController@submit_announcemnt')->middleware(['teacher']);
Route::post('/announcements/save', 'AssignmentAnnouncementController@submit_announcemnt')->middleware(['teacher']);

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

//create course from template
Route::get('/course-getfromtemplate/{id}', 'CourseController@getCourseFromTemplate')->middleware
(['teacher']);

//create new course
Route::get('/course-createnew', 'CourseController@newCourse')->middleware
(['teacher']);

Route::post('/course-createfromtemplate', 'CourseController@createCourseFromTemplate')->middleware(['teacher']);

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
//Route::post('/update_course', 'CourseController@updateCourse')->middleware(['teacher']);
Route::get('/coursetoupdate/{id}', 'CourseController@getCourseToUpdate')->middleware(['teacher'])->name('updatecourse');

//update course status
Route::get('/updatecoursestatus/{id}', 'CourseController@UpdadeCourseStatus')->middleware(['teacher']);

Route::post('/updateCourse/{id}', 'CourseController@updateCourseById')->middleware(['teacher'])->name('update_Course');

Route::post('/update_course', 'CourseController@updateCourse')->middleware(['teacher']);

//delete a course
Route::post('/delete-course', 'CourseController@deleteCourse')->middleware(['teacher']);
//delete course material
Route::get('/delete_course_file/{id}', 'CourseController@deleteCourseFile')->middleware(['teacher']);

//Individual course overview
Route::get('/course-designoverview/{id}','CourseController@courseDesignOverview')->middleware(['teacher']);


//ASSIGNMENTS
Route::get('/assignments', 'AssignmentDescriptionController@getAssignments')->middleware(['teacher']);

//get assignment template
Route::get('/assignment-templates/{id}', 'AssignmentDescriptionController@getAssignmentTemplates')->middleware(['teacher']);


//Admin: get assignment templates
Route::get('/admin_assignment_templates', 'AssignmentDescriptionController@admin_getAssignTemplates')->middleware(['admin']);

//Admin: get course templates
Route::get('/admin_course_templates', 'AssignmentDescriptionController@admin_getCourseTemplates')->middleware(['admin']);


//
Route::get('/assignment-creategetform', 'AssignmentDescriptionController@getCreateAssignFromForm')->middleware(['teacher']);

//createassign
Route::get('/assignment-getfromtemplate/{id}', 'AssignmentDescriptionController@getassignfromtemplate')
    ->middleware(['teacher']);


Route::post('/create_assignmentFromTemplate', 'AssignmentDescriptionController@createAssignmentFromTemplate')
    ->middleware(['teacher']);

Route::post('/assignment-createfromform', 'AssignmentDescriptionController@createAssignment')
    ->middleware(['teacher']);

//create assignment From Course Overview
Route::post('/create_assignmentFromCourseOverview', 'AssignmentDescriptionController@createAssignmentFromCourseOverview')->middleware(['teacher']);

//delete an assignment
Route::post('/delete-assignment', 'AssignmentDescriptionController@deleteAssignment')->middleware(['teacher']);

//
Route::get('/update-assignment/{id}','AssignmentDescriptionController@getUpdateAssignment')->middleware(['teacher']);

//update assignment by id
Route::post('/update_assignment', 'AssignmentDescriptionController@updateAssignment')->middleware
(['teacher']);

Route::post('/assignment_details', 'TeacherController@submitCourse')->middleware(['teacher']);

//Individual course overview
Route::get('/assignment-designoverview/{id}','AssignmentDescriptionController@assignmentDesignOverview')->middleware
(['teacher']);




//CALENDAR
Route::get('/calendar', 'CalendarController@getCalendar')->middleware(['teacher']);

//==============================================================
//End Design
//==============================================================

//==============================================================
//Start MONITORING
//==============================================================
//General courses overview
Route::get('/courses-overview','CourseController@coursesOverview')->middleware(['teacher']);

//Individual course overview
Route::get('/course-overview/{id}','CourseController@courseOverview')->middleware(['teacher']);


Route::get('/assignments-overview', 'TeacherController@getAssignmentsOverview')->middleware(['teacher']);
Route::get('/list-submissions/{id}', 'AssignmentSubmissionController@listSubmission')->middleware(['teacher']);
Route::get('/submission-details/{id}', 'AssignmentSubmissionController@submissionDetails')->middleware(['teacher']);

//Feedback overview
Route::get('/list-feedbacks/{id}', 'FeedbackController@getAllFeedbacks')->middleware(['teacher']);

Route::get('assignment-submissions', 'AssignmentSubmissionController@getAll')->middleware(['teacher']); //route to get all
/*
 * Route::get('/submission-details', function () {
    return view('activities.submission-details', ['user' => \Illuminate\Support\Facades\Auth::user()]);
})->middleware(['teacher']);
*/

Route::get('/sub-details/{id}','AssignmentSubmissionController@subDetails')->middleware(['teacher']);
//==============================================================
//End Monitoring
//==============================================================


//==============================================================
//Start Admin
//==============================================================
//show assoignment template form

//add a user
Route::get('add_user', 'UserController@addUserForm')->middleware(['admin']);

//submit assignment template
Route::post('/submit_user', 'UserController@createUser')->middleware(['admin']);

//import users
Route::get('add_users', 'UserController@addUserForm')->middleware(['admin']);

//submit imports
Route::post('/import', 'UserController@createUser')->middleware(['admin']);


Route::get('create_assigntemplate', 'AssignmentTemplateController@openCreteAssignTemplate')->middleware(['admin']);

//show course template form
Route::get('create_çcoursetemplate', 'AssignmentTemplateController@openCreteACourseTemplate')->middleware(['admin']);

//submit assignment template
Route::post('/create_assign_template', 'AssignmentTemplateController@createAssignTemplate')->middleware(['admin']);

//submit course template
Route::post('/create_course_template', 'AssignmentTemplateController@createCourseTemplate')->middleware(['admin']);


//==============================================================
//End Admin
//==

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





