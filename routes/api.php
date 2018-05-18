<?php

use Illuminate\Http\Request;



Route::get('testeApi', function (){
    return ['response' => true];
});



/**
 * Students Routes
 */
Route::get('students', 'StudentController@getAll'); //route to get all
Route::get('student/{id}', 'StudentController@get'); //route to get a specific
Route::post('student', 'StudentController@store'); //route to store
Route::put('student/{id}', 'StudentController@update'); // route to update
Route::delete('student/{id}', 'StudentController@destroy'); //route to delete

/**
 * AssignmentAnnouncement Routes
 */
Route::get('assignment-announcements', 'AssignmentAnnouncementController@getAll'); //route to get all
Route::get('assignment-announcements/{id}', 'AssignmentAnnouncementController@get'); //route to get a specific
Route::post('assignment-announcement', 'AssignmentAnnouncementController@store'); //route to store
Route::put('assignment-announcement/{id}', 'AssignmentAnnouncementController@update'); // route to update
Route::delete('assignment-announcement/{id}', 'AssignmentAnnouncementController@destroy'); //route to delete


/**
 * AssignmentDescription Routes
 */
Route::get('assignment-descriptions', 'AssignmentDescriptionController@getAll'); //route to get all
Route::get('last-assignment-descriptions', 'AssignmentDescriptionController@getByDeadline'); //route to get all
Route::get('assignment-description/{id}', 'AssignmentDescriptionController@get'); //route to get a specific
Route::post('assignment-description', 'AssignmentDescriptionController@store'); //route to store
Route::put('assignment-description/{id}', 'AssignmentDescriptionController@update'); // route to update
Route::delete('assignment-description/{id}', 'AssignmentDescriptionController@destroy'); //route to delete


/**
 * AssignmentDescriptionTeacher Routes
 */
Route::get('assignment-descriptions-teachers', 'AssignmentDescriptionTeacherController@getAll'); //route to get all
Route::get('last-assignment-descriptions-teachers', 'AssignmentDescriptionTeacherController@getByDeadline'); //route to get all
Route::get('assignment-description-teachers/{id}', 'AssignmentDescriptionTeacherController@get'); //route to get a specific
Route::post('assignment-description-teacher', 'AssignmentDescriptionTeacherController@store'); //route to store
Route::put('assignment-description-teachers/{id}', 'AssignmentDescriptionTeacherController@update'); // route to update
Route::delete('assignment-description-teachers/{id}', 'AssignmentDescriptionTeacherController@destroy'); //route to delete

/**
 * AssignmentSubmissions Routes
 */
Route::get('assignment-submissions', 'AssignmentSubmissionController@getAll'); //route to get all
Route::get('assignment-submission/{id}', 'AssignmentSubmissionController@get'); //route to get a specific
Route::post('assignment-submission', 'AssignmentSubmissionController@store'); //route to store
Route::put('assignment-submission/{id}', 'AssignmentSubmissionController@update'); // route to update
Route::delete('assignment-submission/{id}', 'AssignmentSubmissionController@destroy'); //route to delete


/**
 * AssignmentSubmissionMediaType Routes
 */
Route::get('assignment-submissions-media-types', 'AssignmentSubmissionMediaTypeController@getAll'); //route to get all
Route::get('assignment-submissions-media-types/{id}', 'AssignmentSubmissionMediaTypeController@get'); //route to get a specific
Route::post('assignment-submissions-media-type', 'AssignmentSubmissionMediaTypeController@store'); //route to store
Route::put('assignment-submissions-media-types/{id}', 'AssignmentSubmissionMediaTypeController@update'); // route to update
Route::delete('assignment-submissions-media-types/{id}', 'AssignmentSubmissionMediaTypeController@destroy'); //route to delete


/**
 * Cities Routes
 */
Route::get('cities', 'CityController@getAll'); //route to get all
Route::get('city/{id}', 'CityController@get'); //route to get a specific
Route::post('city', 'CityController@store'); //route to store
Route::put('city/{id}', 'CityController@update'); // route to update
Route::delete('city/{id}', 'CityController@destroy'); //route to delete

/**
 * Course Routes
 */
Route::get('courses', 'CourseController@getAll'); //route to get all
Route::get('course/{id}', 'CourseController@get'); //route to get a specific
Route::post('course', 'CourseController@store'); //route to get a specific
Route::put('course/{id}', 'CourseController@update'); //route to get a specific
Route::post('assignment-description', 'CourseController@store'); //route to store
Route::put('assignment-description/{id}', 'CourseController@update'); // route to update
Route::delete('assignment-description/{id}', 'CourseController@destroy'); //route to delete

/**
 * Department Routes
 */
Route::get('departments', 'DepartmentController@getAll'); //route to get all
Route::get('department/{id}', 'DepartmentController@get'); //route to get a specific
Route::post('department', 'DepartmentController@store'); //route to store
Route::put('department/{id}', 'DepartmentController@update'); // route to update
Route::delete('department/{id}', 'DepartmentController@destroy'); //route to delete

/**
 * DigitalTool Routes
 */
Route::get('digital-tools', 'DigitalToolController@getAll'); //route to get all
Route::get('digital-tools/{id}', 'DigitalToolController@get'); //route to get a specific
Route::post('digital-tool', 'DigitalToolController@store'); //route to store
Route::put('digital-tools/{id}', 'DigitalToolController@update'); // route to update
Route::delete('digital-tools/{id}', 'DigitalToolController@destroy'); //route to delete

/**
 * DigitalToolsStudent Routes
 */
Route::get('digital-tools-students', 'DigitalToolsStudentController@getAll'); //route to get all
Route::get('digital-tools-students/{id}', 'DigitalToolsStudentController@get'); //route to get a specific
Route::post('digital-tools-student', 'DigitalToolsStudentController@store'); //route to store
Route::put('digital-tools-students/{id}', 'DigitalToolsStudentController@update'); // route to update
Route::delete('digital-tools-students/{id}', 'DigitalToolsStudentController@destroy'); //route to delete

/**
 * Feedback Routes
 */
Route::get('feedbacks', 'FeedbackController@getAll'); //route to get all
Route::get('feedback/{id}', 'FeedbackController@get'); //route to get a specific
Route::post('feedback', 'FeedbackController@store'); //route to store
Route::put('feedback/{id}', 'FeedbackController@update'); // route to update
Route::delete('feedback/{id}', 'FeedbackController@destroy'); //route to delete


/**
 * FeedbackMessage Routes
 */
Route::get('feedback-messages', 'FeedbackMessageController@getAll'); //route to get all
Route::get('feedback-messages/{id}', 'FeedbackMessageController@get'); //route to get a specific
Route::post('feedback-message', 'FeedbackMessageController@store'); //route to store
Route::put('feedback-messages/{id}', 'FeedbackMessageController@update'); // route to update
Route::delete('feedback-messages/{id}', 'FeedbackMessageController@destroy'); //route to delete


/**
 * FeedbackTypeAssignmentSubmission Routes
 */
Route::get('feedback-type-assignment-submissions', 'FeedbackTypeAssignmentSubmissionController@getAll'); //route to get all
Route::get('feedback-type-assignment-submission/{id}', 'FeedbackTypeAssignmentSubmissionController@get'); //route to get a specific
Route::post('feedback-type-assignment-submission', 'FeedbackTypeAssignmentSubmissionController@store'); //route to store
Route::put('feedback-type-assignment-submission/{id}', 'FeedbackTypeAssignmentSubmissionController@update'); // route to update
Route::delete('feedback-type-assignment-submission/{id}', 'FeedbackTypeAssignmentSubmissionController@destroy'); //route to delete

/**
 * FeedbackType Routes
 */
Route::get('feedback-types', 'FeedbackTypeController@getAll'); //route to get all
Route::get('feedback-type/{id}', 'FeedbackTypeController@get'); //route to get a specific
Route::post('feedback-type', 'FeedbackTypeController@store'); //route to store
Route::put('feedback-type/{id}', 'FeedbackTypeController@update'); // route to update
Route::delete('feedback-type/{id}', 'FeedbackTypeController@destroy'); //route to delete


/**
 * Group Routes
 */
Route::get('groups', 'GroupController@getAll'); //route to get all
Route::get('group/{id}', 'GroupController@get'); //route to get a specific
Route::post('group', 'GroupController@store'); //route to store
Route::put('group/{id}', 'GroupController@update'); // route to update
Route::delete('group/{id}', 'GroupController@destroy'); //route to delete

/**
 * GroupMessage Routes
 */
Route::get('group-messages', 'GroupMessageController@getAll'); //route to get all
Route::get('group-message/{id}', 'GroupMessageController@get'); //route to get a specific
Route::post('group-message', 'GroupMessageController@store'); //route to store
Route::put('group-message/{id}', 'GroupMessageController@update'); // route to update
Route::delete('group-message/{id}', 'GroupMessageController@destroy'); //route to delete

/**
 * GroupsAssignmetDescription Routes
 */
Route::get('group-assignments-descriptions', 'GroupsAssignmetDescriptionController@getAll'); //route to get all
Route::get('group-assignments-descriptions/{id}', 'GroupsAssignmetDescriptionController@get'); //route to get a specific
Route::post('group-assignments-description', 'GroupsAssignmetDescriptionController@store'); //route to store
Route::put('group-assignments-descriptions/{id}', 'GroupsAssignmetDescriptionController@update'); // route to update
Route::delete('group-assignments-descriptions/{id}', 'GroupsAssignmetDescriptionController@destroy'); //route to delete

/**
 * GroupTeacher Routes
 */
Route::get('group-teachers', 'GroupTeacherController@getAll'); //route to get all
Route::get('group-teacher/{id}', 'GroupTeacherController@get'); //route to get a specific
Route::post('group-teacher', 'GroupTeacherController@store'); //route to store
Route::put('group-teacher/{id}', 'GroupTeacherController@update'); // route to update
Route::delete('group-teacher/{id}', 'GroupTeacherController@destroy'); //route to delete

/**
 * Level Routes
 */
Route::get('levels', 'LevelController@getAll'); //route to get all
Route::get('level/{id}', 'LevelController@get'); //route to get a specific
Route::post('level', 'LevelController@store'); //route to store
Route::put('level/{id}', 'LevelController@update'); // route to update
Route::delete('level/{id}', 'LevelController@destroy'); //route to delete


/**
 * MediaType Routes
 */
Route::get('media-types', 'MediaTypeController@getAll'); //route to get all
Route::get('media-type/{id}', 'MediaTypeController@get'); //route to get a specific
Route::post('media-type', 'MediaTypeController@store'); //route to store
Route::put('media-type/{id}', 'MediaTypeController@update'); // route to update
Route::delete('media-type/{id}', 'MediaTypeController@destroy'); //route to delete


/**
 * Question Routes
 */
Route::get('questions', 'QuestionController@getAll'); //route to get all
Route::get('question/{id}', 'QuestionController@get'); //route to get a specific
Route::post('question', 'QuestionController@store'); //route to store
Route::put('question/{id}', 'QuestionController@update'); // route to update
Route::delete('question/{id}', 'QuestionController@destroy'); //route to delete

/**
 * QuestionSelfAssessment Routes
 */
Route::get('question-self-assessments', 'QuestionSelfAssessmentController@getAll'); //route to get all
Route::get('question-self-assessment/{id}', 'QuestionSelfAssessmentController@get'); //route to get a specific
Route::post('question-self-assessment', 'QuestionSelfAssessmentController@store'); //route to store
Route::put('question-self-assessment/{id}', 'QuestionSelfAssessmentController@update'); // route to update
Route::delete('question-self-assessment/{id}', 'QuestionSelfAssessmentController@destroy'); //route to delete


/**
 * RatingFeedback Routes
 */
Route::get('rating-feedbacks', 'RatingFeedbackController@getAll'); //route to get all
Route::get('rating-feedback/{id}', 'RatingFeedbackController@get'); //route to get a specific
Route::post('rating-feedback', 'RatingFeedbackController@store'); //route to store
Route::put('rating-feedback/{id}', 'RatingFeedbackController@update'); // route to update
Route::delete('rating-feedback/{id}', 'RatingFeedbackController@destroy'); //route to delete


/**
 * Schools Routes
 */
Route::get('schools', 'SchoolController@getAll'); //route to get all
Route::get('school/{id}', 'SchoolController@get'); //route to get a specific
Route::post('school', 'SchoolController@store'); //route to store
Route::put('school/{id}', 'SchoolController@update'); // route to update
Route::delete('school/{id}', 'SchoolController@destroy'); //route to delete


/**
 * SelfAssessment Routes
 */
Route::get('self-assessments', 'SelfAssessmentController@getAll'); //route to get all
Route::get('self-assessment/{id}', 'SelfAssessmentController@get'); //route to get a specific
Route::post('self-assessment', 'SelfAssessmentController@store'); //route to store
Route::put('self-assessment/{id}', 'SelfAssessmentController@update'); // route to update
Route::delete('self-assessment/{id}', 'SelfAssessmentController@destroy'); //route to delete

/**
 * StudentMember Routes
 */
Route::get('student-members', 'StudentMemberController@getAll'); //route to get all
Route::get('student-member/{id}', 'StudentMemberController@get'); //route to get a specific
Route::post('student-member', 'StudentMemberController@store'); //route to store
Route::put('student-member/{id}', 'StudentMemberController@update'); // route to update
Route::delete('student-member/{id}', 'StudentMemberController@destroy'); //route to delete


/**
 * StudentNotificationStatus Routes
 */
Route::get('students-notifications-status', 'StudentNotificationStatusController@getAll'); //route to get all
Route::get('students-notifications-status/{id}', 'StudentNotificationStatusController@get'); //route to get a specific
Route::post('students-notifications-status', 'StudentNotificationStatusController@store'); //route to store
Route::put('students-notifications-status/{id}', 'StudentNotificationStatusController@update'); // route to update
Route::delete('students-notifications-status/{id}', 'StudentNotificationStatusController@destroy'); //route to delete

/**
 * StudentsCourse Routes
 */
Route::get('students-courses', 'StudentsCourseController@getAll'); //route to get all
Route::get('students-course/{id}', 'StudentsCourseController@get'); //route to get a specific
Route::post('students-course', 'StudentsCourseController@store'); //route to store
Route::put('students-course/{id}', 'StudentsCourseController@update'); // route to update
Route::delete('students-course/{id}', 'StudentsCourseController@destroy'); //route to delete


/**
 * Subject Routes
 */
Route::get('subjects', 'SubjectController@getAll'); //route to get all
Route::get('subject/{id}', 'SubjectController@get'); //route to get a specific
Route::post('subject', 'SubjectController@store'); //route to store
Route::put('subject/{id}', 'SubjectController@update'); // route to update
Route::delete('subject/{id}', 'SubjectController@destroy'); //route to delete

/**
 * SubjectStudent Routes
 */
Route::get('subject-students', 'SubjectStudentController@getAll'); //route to get all
Route::get('subject-student/{id}', 'SubjectStudentController@get'); //route to get a specific
Route::post('subject-student', 'SubjectStudentController@store'); //route to store
Route::put('subject-student/{id}', 'SubjectStudentController@update'); // route to update
Route::delete('subject-student/{id}', 'SubjectStudentController@destroy'); //route to delete


/**
 * Teacher Routes
 */
Route::get('teachers', 'TeacherController@getAll'); //route to get all
Route::get('teacher/{id}', 'TeacherController@get'); //route to get a specific
Route::post('teacher', 'TeacherController@store'); //route to store
Route::put('teacher/{id}', 'TeacherController@update'); // route to update
Route::delete('teacher/{id}', 'TeacherController@destroy'); //route to delete


/**
 * TeacherCourse Routes
 */
Route::get('teacher-courses', 'TeacherCourseController@getAll'); //route to get all
Route::get('teacher-course/{id}', 'TeacherCourseController@get'); //route to get a specific
Route::post('teacher-course', 'TeacherCourseController@store'); //route to store
Route::put('teacher-course/{id}', 'TeacherCourseController@update'); // route to update
Route::delete('teacher-course/{id}', 'TeacherCourseController@destroy'); //route to delete


/**
 * TeacherMember Routes
 */
Route::get('teacher-members', 'TeacherMemberController@getAll'); //route to get all
Route::get('teacher-member/{id}', 'TeacherMemberController@get'); //route to get a specific
Route::post('teacher-member', 'TeacherMemberController@store'); //route to store
Route::put('teacher-member/{id}', 'TeacherMemberController@update'); // route to update
Route::delete('teacher-member/{id}', 'TeacherMemberController@destroy'); //route to delete


/**
 * TechUse Routes
 */
Route::get('tech-uses', 'TechUseController@getAll'); //route to get all
Route::get('tech-use/{id}', 'TechUseController@get'); //route to get a specific
Route::post('tech-use', 'TechUseController@store'); //route to store
Route::put('tech-use/{id}', 'TechUseController@update'); // route to update
Route::delete('tech-use/{id}', 'TechUseController@destroy'); //route to delete

/**
 * TechUseStudent Routes
 */
Route::get('tech-use-students', 'TechUseStudentController@getAll'); //route to get all
Route::get('tech-use-student/{id}', 'TechUseStudentController@get'); //route to get a specific
Route::post('tech-use-student', 'TechUseStudentController@store'); //route to store
Route::put('tech-use-student/{id}', 'TechUseStudentController@update'); // route to update
Route::delete('tech-use-student/{id}', 'TechUseStudentController@destroy'); //route to delete



/**
 * User Routes
 */
Route::post('user/login', 'UserController@login');
Route::post('user/logout', 'UserController@logout');
Route::post('get-user-token/{token}', 'UserController@getUserFromToken');
Route::get('users', 'UserController@getAll'); //route to get all
Route::get('users', 'UserController@getAll'); //route to get all
Route::get('users', 'UserController@getAll'); //route to get all
Route::get('user/{id}', 'UserController@get'); //route to get a specific
Route::post('user', 'UserController@store'); //route to store
Route::put('user/{id}', 'UserController@update'); // route to update
Route::delete('user/{id}', 'UserController@destroy'); //route to delete




/**
 * WorkMethod Routes
 */
Route::get('work-methods', 'WorkMethodController@getAll'); //route to get all
Route::get('work-method/{id}', 'WorkMethodController@get'); //route to get a specific
Route::post('work-method', 'WorkMethodController@store'); //route to store
Route::put('work-method/{id}', 'WorkMethodController@update'); // route to update
Route::delete('work-method/{id}', 'WorkMethodController@destroy'); //route to delete


/**
 * WorkMethodStudent Routes
 */
Route::get('work-methods-students', 'WorkMethodStudentController@getAll'); //route to get all
Route::get('work-methods-student/{id}', 'WorkMethodStudentController@get'); //route to get a specific
Route::post('work-methods-student', 'WorkMethodStudentController@store'); //route to store
Route::put('work-methods-student/{id}', 'WorkMethodStudentController@update'); // route to update
Route::delete('work-methods-student/{id}', 'WorkMethodStudentController@destroy'); //route to delete



/**
 * WorkplaceTool Routes
 */
Route::get('workplace-tools', 'WorkplaceToolController@getAll'); //route to get all
Route::get('workplace-tool/{id}', 'WorkplaceToolController@get'); //route to get a specific
Route::post('workplace-tool', 'WorkplaceToolController@store'); //route to store
Route::put('workplace-tool/{id}', 'WorkplaceToolController@update'); // route to update
Route::delete('workplace-tool/{id}', 'WorkplaceToolController@destroy'); //route to delete


/**
 * WorkplaceToolStudent Routes
 */
Route::get('workplaces-tool-students', 'WorkplaceToolStudentController@getAll'); //route to get all
Route::get('workplace-tool-student/{id}', 'WorkplaceToolStudentController@get'); //route to get a specific
Route::post('workplace-tool-student', 'WorkplaceToolStudentController@store'); //route to store
Route::put('workplace-tool-student/{id}', 'WorkplaceToolStudentController@update'); // route to update
Route::delete('workplace-tool-student/{id}', 'WorkplaceToolStudentController@destroy'); //route to delete




