<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//array of course names
$courses = ['STL 2016','STL 2017','STL 2018','STL 2015','STL 2019'];
//Feeding the database(DB) with info from arry of courses
$factory->define(\App\Models\CoursesTemplate::class, function (Faker $faker) use ($courses) {
    return [
        'name' => $faker->unique()->randomElement($courses),
        'course_content' => $faker->text,
    ];
});

//Feeding the database(DB) with info from arry of courses
$courses = ['STL 2016','STL 2017','STL 2018','STL 2015','STL 2019'];
$factory->define(\App\Models\Course::class, function (Faker $faker) use ($courses) {
    return [
        'name' => $faker->randomElement($courses),
        'course_content' => $faker->text,
        'startdate' => $faker->date('Y-m-d'),
        'available_date' => $faker->date('Y-m-d'),
        'status' => $faker->numberBetween(1, 2),
        'departments_id' => $faker->numberBetween(1, \App\models\Department::all()->count()),
    ];
});

//arry of department names
$department_names = ['Science','Health','Education']; //array of department names
//feeding the DB with info from arry of departments
$factory->define(\App\Models\Department::class, function (Faker $faker) use ($department_names) {
    return [
        'name' => $faker->unique()->randomElement($department_names),
    ];
});

//array of cities
$cities=['Ale','Alingsås','Alvesta','Aneby','Arboga','Arjeplogs','Arvidsjaurs','Arvika','Askersunds','Avesta'];
//feeding the DB
$factory->define(\App\Models\City::class, function (Faker $faker) use ($cities) {
    return [
        'city_name' => $faker->unique()->randomElement($cities),
    ];
});

//array of schools
$schools=['Livets hårda skola','Svandammsskolan','Barn-och utbildnings förvaltningen','Skoldatateket','Trekantenskolan',
    'Funkaboskolan','Bergshamraskolan','Åtteråsskolan','Skeppshultskolan','Villstadskolan'];
//feeding the DB
$factory->define(\App\Models\School::class, function (Faker $faker) use ($schools) {
    return [
        'school_name' => $faker->unique()->randomElement($schools),
        'cities_id' => $faker->unique()->numberBetween(1,\App\Models\City::all()->count()),
    ];
});

//array of names
$firstnames=['Martin','Anneli','Pia','Camilla','Anita','Anne','Annette','Peggy','Anna', 'Åke',
    'Agélii','Lisen','Susanna','Catherine'];
//array of last names
$lastnames=['Bergström','Linnér','Adolfsson','Johansson','Lundkvist','Erdhage','Lundström','Bolin Johansson','Blohm','Grönlund',
    'Genlott Annika',' Bolander','Frigghe','Mortimer-Hawkins'];
//arry of emails
$emails=['mbergstrom@instructure.com','ann-christine.thunqvist@nynashamn.se','pia.adolfsson@edu.gislaved.se','camjoh@edu.gislaved.se','anita.lundkvist@upplands-bro.se',
    'anne.erdhage@upplands-bro.se','annette.lundstrom@kalmar.se','peggy.bolin-johansson@kalmar.se','anna.blohm@kalmar.se','ake.gronlund@oru.se',
    'annika.agelii.genlott@skl.se','lisen.bolander@nacka.se','susanna.frigghe@utb.nacka.se','mocat_s@edu.sollentuna.se'];
//arry of telephones
$telephone=['0735430430','0761258772','0730882913','0722220276','0721788074','0721788073','0768679136','0703922936','0706886769','0704524964','019301295'];
//feeding the DB with emails and telephones
//$factory->define(\App\Models\User::class, function (Faker $faker) use ($firstnames,$lastnames,$emails,
//    $telephone) {
//    for ($i=0; $i<10; $i++){
//
//        $fname = $firstnames[$i];
//        $lname=$lastnames[$i];
//        $phone=$telephone[$i];
//        $e_mail=$emails[$i];
//        return [
//            'first_name' => $faker->randomElements($firstnames,$i, false),
////            'first_name' => $faker->format(string, ),
//            'last_name' => $faker->randomElements($lastnames,$i, false),
//            'telephone' => $faker->randomElements($telephone,$i, false),
//            'email' => $faker->randomElements($emails,$i, false),
//            //'password' => $faker->randomElement($telephone)
//        ];
//    }
//});

//feeding the DB
$usertypes=['Adminstrator','Instructor','Participant'];
$factory->define(\App\Models\UserType::class, function (Faker $faker) use ($usertypes){
        return [
            'name' => $faker->randomElement($usertypes),
            ];

});

$factory->define(\App\User::class, function (Faker $faker) {
        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'telephone' => $faker->phoneNumber,
            'email' => $faker->unique()->email,
            'user_types_id' => $faker->numberBetween(1,\App\Models\UserType::all()->count()),
            'password' => '123456',
            'schools_id'=> $faker->numberBetween(1, \App\Models\School::all()->count()),
            'cities_id'=> $faker->numberBetween(1, \App\Models\City::all()->count()),
        ];
});

//feeding data with info about assignment description
$assignmentStatus = [0,1,2];
$factory->define(\App\Models\AssignmentDescription::class, function (Faker $faker) use ($assignmentStatus){
    return [
        'case' => $faker->text(30),
        'number' => $faker->numberBetween(1, 10),
        'instructions' => $faker->text,
        'startdate' => $faker->date('Y-m-d'),
        'deadline'=> $faker->date('Y-m-d'),
        'available_date'=> $faker->date('Y-m-d'),
        'status' => $faker->randomElement($assignmentStatus),
        'group_teachers_id' => $faker->numberBetween(1, \App\Models\GroupTeacher::all()->count()),
        'courses_id' => $faker->numberBetween(1, \App\Models\Course::all()->count()),
    ];
});

$factory->define(\App\Models\AssignmentTemplate::class, function (Faker $faker){
    return [
        'case' => $faker->text(30),
        'number' => $faker->numberBetween(1, 10),
        'instructions' => $faker->text,
    ];
});



//
$factory->define(\App\Models\AssignmentDescriptionsHasCourse::class, function (Faker $faker){
    return [
        'assignment_descriptions_id' => $faker->numberBetween(1, \App\Models\AssignmentDescription::all()->count()),
        'courses_id' => $faker->numberBetween(1, \App\Models\Course::all()->count()),
    ];
});

//feeding TeacherCourse
$factory->define(\App\Models\TeacherCourse::class, function (Faker $faker){
    return [
        'teachers_id' => $faker->numberBetween(1, \App\Models\Teacher::all()->count()),
        'courses_id' => $faker->numberBetween(1, \App\Models\Course::all()->count()),
    ];
});

//Feeding Teacher

$factory->define(\App\Models\Teacher::class, function (Faker $faker){
    return [
        'users_id' => $faker->unique()->numberBetween(2, 6),
    ];
});


//feeding DB with fake data for Group
$factory->define(\App\Models\Group::class, function (Faker $faker){
    return [
        'group_cod' => $faker->numberBetween(110, 1000),
        'group_name' => $faker->numberBetween(35, 1000),
    ];
});

//feeding DB with GroupsAssignmentDescription
$factory->define(\App\Models\GroupsAssignmentDescription::class, function (Faker $faker){
    return [
        'groups_id' => $faker->numberBetween(1, \App\Models\Group::all()->count()),
        'assignment_descriptions_id'=> $faker->numberBetween(1, \App\models\AssignmentDescription::all()->count()),
    ];
});

//feeding DB with data fake data for level
//$levelnumber=['1','2','3'];
$factory->define(\App\Models\Level::class, function (Faker $faker){
    return [
        'level_number' => $faker->numberBetween(1, 6),
    ];
});

//feeding Question
$factory->define(\App\Models\Question::class, function (Faker $faker){
    return [
        'description' => $faker->text(150),
        'levels_id'=>$faker->numberBetween(1, \App\Models\Level::all()->count()),
    ];
});

//feeding QuestionsSelfAssessment
$factory->define(\App\Models\QuestionsSelfAssessment::class, function (Faker $faker){
    return [
        'questions_id' => $faker->numberBetween(1, \App\Models\Question::all()->count()),
        'self_assessments_id'=>$faker->numberBetween(1, \App\Models\SelfAssessment::all()->count()),
        'response'=>$faker->boolean(50),
    ];
});

//feeding SelfAssessment
$factory->define(\App\Models\SelfAssessment::class, function (Faker $faker){
    return [
        'students_courses_id'=>$faker->numberBetween(1, \App\Models\StudentsCourse::all()->count()),
        'status'=> $faker->numberBetween(1,2),
        'submission_date' => $faker->date('Y-m-d'),
    ];
});

//feeding StudentsCourse
$factory->define(\App\Models\StudentsCourse::class, function (Faker $faker){
    return [
        'students_id' => $faker->numberBetween(1, \App\Models\Student::all()->count()),
        'courses_id'=>$faker->numberBetween(1, \App\Models\Course::all()->count()),
        'start_date' => $faker->date('Y-m-d'),
        'end_date'=> $faker->date('Y-m-d'),
        'status'=> $faker->numberBetween(1,2),
    ];
});

//feeding Student
$factory->define(\App\Models\Student::class, function (Faker $faker){
    return [
        'teaching_grade' => $faker->numberBetween(1, 12),
        'years_as_teacher' => $faker->numberBetween(1, 50),
        'technical_support' => $faker->boolean(50),
        'student_to_student_feedback' => $faker->boolean(50),
        'student_to_student_feedback_other' => $faker->text(30),
        'users_id'=> $faker->unique()->numberBetween(1, \App\User::all()->count()),
        'schools_id'=> $faker->numberBetween(1, \App\Models\School::all()->count()),
        'cities_id'=> $faker->numberBetween(1, \App\Models\City::all()->count()),
/*        'digital_tools' => $faker->text(30),
        'workplace_tools' => $faker->boolean,
        'workplace_tools_othe' => $faker->text(30),
        'work_methods' => $faker->text(30),
        'subjects' => $faker->text(30),
        'technology_use_in_teaching' => $faker->text(30),
*/
    ];
});

//feeding AssignmentAnnouncement
$factory->define(\App\Models\AssignmentAnnouncement::class, function (Faker $faker){
    return [
        'assignment_descriptions_id'=>$faker->numberBetween(1, \App\Models\AssignmentDescription::all()->count()),
        'teacher_members_id'=>$faker->numberBetween(1, \App\Models\TeacherMember::all()->count()),
        'message' =>$faker->text(60),
        'subject' =>$faker->text(20),
        'status' => $faker->numberBetween(0,1),
        'date' => $faker->date('Y-m-d'),
        'teachers_id' => $faker->numberBetween(1, \App\Models\Teacher::all()->count()),
    ];
});

//feeding TeacherMember
$factory->define(\App\Models\TeacherMember::class, function (Faker $faker){
    return [
        'group_teachers_id'=>$faker->numberBetween(1, \App\Models\GroupTeacher::all()->count()),
        'teachers_id'=>$faker->numberBetween(1, \App\Models\Teacher::all()->count()),
    ];
});

//feeding GroupTeacher
$factory->define(\App\Models\GroupTeacher::class, function (Faker $faker){
    return [
        'group_name'=>$faker->text(20)
    ];
});


//feeding Feedback
$factory->define(\App\Models\Feedback::class, function (Faker $faker){
    return [
        'goal' => $faker->text(30),
        'message' => $faker->text(30),
        'advice' => $faker->text(30),
        'comment' => $faker->text(30),
        'feedback_date' => $faker->date('Y-m-d'),
        'assignment_submissions_id'=> $faker->numberBetween(1, \App\Models\AssignmentSubmission::all()->count()),
        'students_id'=> $faker->numberBetween(1, \App\Models\Student::all()->count()),
    ];
});

//feeding AssignmentSubmission
$factory->define(\App\Models\AssignmentSubmission::class, function (Faker $faker){
    return [
        'area' => $faker->text(30),
        'grade' => $faker->numberBetween(1, 12),
        'number_of_students' => $faker->numberBetween(5, 30),
        'start_date_of_lecture' => $faker->date('Y-m-d'),
        'end_date_of_lecture' => $faker->date('Y-m-d'),
        'purpose' => $faker->text(30),
        'curriculum_requirement' => $faker->text(30),
        'preview_text' => $faker->text(30),
        'preview_check' => $faker->text(10),
        'inspiration_choiche' => $faker->boolean(50),
        'inspiration_text' => $faker->text(15),
        'text_types' => $faker->text(30),
        'task_formulation' => $faker->text(30),
        'feedback_text' => $faker->text(30),
        'assessment' => $faker->text(30),
        'analysis_measure' => $faker->numberBetween(1,10),
        'analysis_text' => $faker->text(30),
        'good_experience' => $faker->text(30),
        'bad_experience' => $faker->text(30),
        'learned_consequence' => $faker->text(30),
        'next_goal' => $faker->text(30),
        'status'=> $faker->numberBetween(1,2),
        'submission_date' => $faker->date('Y-m-d'),
        'students_id'=> $faker->numberBetween(1, \App\Models\Student::all()->count()),
        'assignment_descriptions_id'=> $faker->numberBetween(1, \App\models\AssignmentDescription::all()->count()),

/*
        'media_type_other' => $faker->text(30),
        'feedback_check' => $faker->text(10),
*/
    ];
});

//feeding MediaType
$factory->define(\App\Models\MediaType::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding GroupMessage
$factory->define(\App\Models\GroupMessage::class, function (Faker $faker){
    return [
        'member_id' => $faker->numberBetween(1,\App\Models\StudentMember::all()->count()),
        'groups_assignment_descriptions_id' => $faker->numberBetween(1,\App\Models\GroupsAssignmentDescription::all()
            ->count()),
        'mensagem' => $faker->text(30),
        'status' => $faker->boolean(50),
    ];
});

//feeding FeedbackType
$factory->define(\App\Models\FeedbackType::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding FeedbackTypeAssignmentSubmission
$factory->define(\App\Models\FeedbackTypeAssignmentSubmission::class, function (Faker $faker){
    return [
        'feedback_type_id' => $faker->numberBetween(1,\App\Models\FeedbackType::all()->count()),
        'assignment_submissions_id' => $faker->numberBetween(1,\App\Models\AssignmentSubmission::all()->count()),
    ];
});

//feeding FeedbackMessage
$factory->define(\App\Models\FeedbackMessage::class, function (Faker $faker){
    return [
        'students_sender' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
        'students_reciever' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
        'mensagem' => $faker->text(30),
        'status' => $faker->boolean(50),
    ];
});

//feeding DigitalToolsHasStudent
$factory->define(\App\Models\DigitalToolsHasStudent::class, function (Faker $faker){
    return [
        'digital_tools_id' => $faker->numberBetween(1,\App\Models\DigitalTool::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
    ];
});

//feeding DigitalTool
$factory->define(\App\Models\DigitalTool::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding AssignmentDescriptionsHasTeacher
$factory->define(\App\Models\AssignmentDescriptionsHasTeacher::class, function (Faker $faker){
    return [
        'assignment_descriptions_id' => $faker->numberBetween(1,\App\Models\AssignmentDescription::all()->count()),
        'teachers_id' => $faker->numberBetween(1,\App\Models\Teacher::all()->count()),
    ];
});

//feeding AssignmentSubmissionsMediaType
$factory->define(\App\Models\AssignmentSubmissionsMediaType::class, function (Faker $faker){
    return [
        'assignment_submissions_id' => $faker->numberBetween(1,\App\Models\AssignmentSubmission::all()->count()),
        'media_type_id' => $faker->numberBetween(1,\App\Models\MediaType::all()->count()),
    ];
});

//feeding RatingFeedback
$factory->define(\App\Models\RatingFeedback::class, function (Faker $faker){
    return [
        'goal' => $faker->numberBetween(0,5),
        'timing' => $faker->numberBetween(0, 5),
        'message' => $faker->numberBetween(0,5),
        'advice' => $faker->numberBetween(0,5),
        'comment' => $faker->text(150),
        'feedback_rating_date' => $faker->date('Y-m-d'),
        'feedbacks_id' => $faker->numberBetween(1,\App\Models\Feedback::all()->count()),
    ];
});

//feeding StudentMember
$factory->define(\App\Models\StudentMember::class, function (Faker $faker){
    return [
        'groups_id' => $faker->numberBetween(1,\App\Models\Group::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
        'status' => $faker->boolean(50),
    ];
});

//feeding StudentAnnouncementsStatus
$factory->define(\App\Models\StudentAnnouncementsStatus::class, function (Faker $faker){
    return [
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
        'assignment_notifications_id' => $faker->numberBetween(1,\App\Models\AssignmentAnnouncement::all()->count()),
        'status'  => $faker->numberBetween(1,2),
    ];
});

//feeding Subject
$factory->define(\App\Models\Subject::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding SubjectsHasStudent
$factory->define(\App\Models\SubjectsHasStudent::class, function (Faker $faker){
    return [
        'subjects_id' => $faker->numberBetween(1,\App\Models\Subject::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
    ];
});

//feeding TechUse
$factory->define(\App\Models\TechUse::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding TechUseHasStudent
$factory->define(\App\Models\TechUseHasStudent::class, function (Faker $faker){
    return [
        'tech_use_id' => $faker->numberBetween(1,\App\Models\TechUse::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
    ];
});

//feeding WorkMethod
$factory->define(\App\Models\WorkMethod::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding WorkMethodsHasStudent
$factory->define(\App\Models\WorkMethodsHasStudent::class, function (Faker $faker){
    return [
        'work_methods_id' => $faker->numberBetween(1,\App\Models\WorkMethod::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
    ];
});

//feeding WorkplaceTool
$factory->define(\App\Models\WorkplaceTool::class, function (Faker $faker){
    return [
        'name' => $faker->text(30),
    ];
});

//feeding WorkplaceToolsHasStudent
$factory->define(\App\Models\WorkplaceToolsHasStudent::class, function (Faker $faker){
    return [
        'workplace_tools_id' => $faker->numberBetween(1,\App\Models\WorkplaceTool::all()->count()),
        'students_id' => $faker->numberBetween(1,\App\Models\Student::all()->count()),
    ];
});

//feeding calendar
$colors=['Success','Danger','Info','Primary','Warning','Inverse'];
$factory->define(\App\Models\Calendar::class, function (Faker $faker) use ($colors){
    return [
        'eventname' => $faker->text(12),
        'event_startdate' => $faker->date('Y-m-d'),
        'event_enddate' => $faker->date('Y-m-d'),
        'color' => $faker->randomElement($colors),
        'users_id' => $faker->numberBetween(1,\App\User::all()->count()),
    ];
});

//feeding Course Announcements
$factory->define(\App\Models\CourseAnnouncement::class, function (Faker $faker) use ($colors){
    return [
        'courses_id' => $faker->numberBetween(1,\App\Models\Course::all()->count()),
        'teachers_id'  => $faker->numberBetween(1,\App\Models\Teacher::all()->count()),
        'message'  =>  $faker->text(45),
        'subject'  =>  $faker->text(15),
        'status' => $faker->numberBetween(0,1),
        'teacher_members_id'  => $faker->numberBetween(1,\App\Models\TeacherMember::all()->count()),
    ];
});

//feeding User Chats
$factory->define(\App\Models\UsersChat::class, function (Faker $faker) use ($colors){
    return [
        'message'  =>  $faker->text(45),
        'subject'  =>  $faker->text(15),
        'status' => $faker->numberBetween(1,2),
        'sender_id'  => $faker->numberBetween(1,\App\User::all()->count()),
        'receiver_id'  => $faker->numberBetween(1,\App\User::all()->count()),
        'courses_id' => $faker->numberBetween(1,\App\Models\Course::all()->count()),
        'assignment_description_id' => $faker->numberBetween(1,\App\Models\AssignmentDescription::all()->count()),
    ];
});
