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
//
//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});



$courses = ['Computer Science','Network Admin','Database designer']; //array of course names
$factory->define(\App\Models\Course::class, function (Faker $faker) use ($courses) {
    return [

        'name' => $faker->unique()->randomElement($courses),
        'course_content' => $faker->text(10),
        'departments_id' => $faker->numberBetween(1, \App\models\Department::all()->count()),
    ];
});

$department_names = ['Science','Health']; //array of department names
$factory->define(\App\Models\Department::class, function (Faker $faker) use ($department_names) {
    return [
        'name' => $faker->unique()->randomElement($department_names),
    ];
});

$cities=['Ale','Alingsås','Alvesta','Aneby','Arboga','Arjeplogs','Arvidsjaurs','Arvika','Askersunds','Avesta'];
$factory->define(\App\Models\City::class, function (Faker $faker) use ($cities) {
    return [
        'city_name' => $faker->unique()->randomElement($cities),
    ];
});

$schools=['Livets hårda skola','Svandammsskolan','Barn-och utbildnings förvaltningen','Skoldatateket','Trekantenskolan',
    'Funkaboskolan','Bergshamraskolan','Åtteråsskolan','Skeppshultskolan','Villstadskolan'];
$factory->define(\App\Models\School::class, function (Faker $faker) use ($schools) {
    return [
        'school_name' => $faker->unique()->randomElement($schools),
    ];
});

$emails=['mbergstrom@instructure.com','ann-christine.thunqvist@nynashamn.se','pia.adolfsson@edu.gislaved.se','camjoh@edu.gislaved.se','anita.lundkvist@upplands-bro.se',
    'anne.erdhage@upplands-bro.se','annette.lundstrom@kalmar.se','peggy.bolin-johansson@kalmar.se','anna.blohm@kalmar.se','marie.horn@kalmar.se'];
$telephone=['0735430430','0761258772','0730882913','0722220276','0721788074','0721788073','0768679136','0703922936','0706886769','0704524964','0704417723'];
$factory->define(\App\Models\User::class, function (Faker $faker) use ($emails,$telephone) {
    return [
        'first_name' => $faker->text(10),
        'last_name' => $faker->text(10),
        'telephone' => $faker->unique()->randomElement($telephone),
        'email' => $faker->unique()->randomElement($emails),
        'last_name' => $faker->text(10),
        'user_password' => "12345"
    ];
});

$factory->define(\App\Models\AssignmentDescription::class, function (Faker $faker){
    return [
        'case' => $faker->text(15),
        'instructions' => $faker->text(35),
        'startdate' => $faker->date('Y-m-d'),
        'deadline'=> $faker->date('Y-m-d'),
        'available_date'=> $faker->date('Y-m-d'),
        'teacher_courses_id' => $faker->unique()->numberBetween(1, \App\models\Course::all()->count()),
    ];
});

$factory->define(\App\Models\GroupAssignment::class, function (Faker $faker){
    return [
        'group_cod' => $faker->numberBetween(110, 1000),
        'presence' => $faker->numberBetween(35, 1000),
        'activity_date' => $faker->numberBetween(50, 1000),
        'assignment_descriptions_id'=> $faker->numberBetween(1, \App\models\AssignmentDescription::all()->count()),
    ];
});

$teacher_names=['Agélii Genlott Annika','Anna Carlsson','Catherine Mortimer-Hawkins','Cecilia Gustavsson','Ditte O\'Connor'];
$factory->define(\App\Models\Teacher::class, function (Faker $faker) use ($teacher_names){
    return [
        'name' => $faker->unique()->randomElement($teacher_names),
        'users_id' => $faker->numberBetween(1, 5),
    ];
});


$factory->define(\App\Models\TeacherCourse::class, function (Faker $faker){
    return [
        'teachers_id' => $faker->numberBetween(1, \App\models\Teacher::all()->count()),
        'courses_id' => $faker->numberBetween(1, \App\models\Course::all()->count()),
    ];
});

$factory->define(\App\Models\AssignmentDescription::class, function (Faker $faker){
    return [
        'case' => $faker->text(15),
        'instructions' => $faker->text(35),
        'startdate' => $faker->date('Y-m-d'),
        'deadline'=> $faker->date('Y-m-d'),
        'available_date'=> $faker->date('Y-m-d'),
        'teacher_courses_id' => $faker->numberBetween(1, \App\models\TeacherCourse::all()->count()),
    ];
});

$factory->define(\App\Models\AssignmentNotifications::class, function (Faker $faker){
    return [
        'message' =>$faker->text(60),
        'status' => $faker->boolean(50),
        'assignment_descriptions_id'=> $faker->numberBetween(1, \App\models\AssignmentDescription::all()->count()),
    ];
});

$factory->define(\App\Models\Feedback::class, function (Faker $faker){
    return [
        'goal' => $faker->text(30),
        'message' => $faker->text(30),
        'advice' => $faker->text(30),
        'comment' => $faker->text(30),
        'feedback_date' => $faker->date('Y-m-d'),
        'assignment_submissions_id'=> $faker->numberBetween(1, \App\models\AssignmentSubmission::all()->count()),
        'students_id'=> $faker->numberBetween(1, \App\models\Student::all()->count()),
    ];
});

$factory->define(\App\Models\AssignmentSubmission::class, function (Faker $faker){
    return [
        'area' => $faker->text(30),
        'grade' => $faker->unique()->numberBetween(1, 12),
        'number_of_students' => $faker->unique()->numberBetween(5, 30),
        'start_date_of_lecture' => $faker->date('Y-m-d'),
        'end_date_of_lecture' => $faker->date('Y-m-d'),
        'purpose' => $faker->text(30),
        'curriculum_requirement' => $faker->text(30),
        'preview_text' => $faker->text(30),
        'preview_check' => $faker->text(10),
        'inspiration' => $faker->text(30),
        'text_types' => $faker->text(30),
        'task_formulation' => $faker->text(30),
        'media_type' => $faker->text(10),
        'media_type_other' => $faker->text(30),
        'feedback_check' => $faker->text(10),
        'feedback_text' => $faker->text(30),
        'assessment' => $faker->text(30),
        'analysis_measure' => $faker->text(10),
        'analysis_text' => $faker->text(30),
        'good_experience' => $faker->text(30),
        'bad_experience' => $faker->text(30),
        'learned_consequence' => $faker->text(30),
        'next_goal' => $faker->text(30),
        'submission_date' => $faker->date('Y-m-d'),
        'courses_id'=> $faker->numberBetween(1, \App\models\Course::all()->count()),
        'teachers_id'=> $faker->numberBetween(1, \App\models\Teacher::all()->count()),
        'group_assignments_id'=> $faker->numberBetween(1, \App\models\GroupAssignment::all()->count()),
    ];
});

$factory->define(\App\Models\Student::class, function (Faker $faker){
    return [
        'digital_tools' => $faker->text(30),
        'workplace_tools' => $faker->boolean,
        'workplace_tools_othe' => $faker->text(30),
        'teaching_grade' => $faker->unique()->numberBetween(1, 12),
        'work_methods' => $faker->text(30),
        'subjects' => $faker->text(30),
        'years_as_teacher' => $faker->unique()->numberBetween(1, 50),
        'technical_support' => $faker->boolean(50),
        'student_to_student_feedback' => $faker->boolean(50),
        'student_to_student_feedback_other' => $faker->text(30),
        'technology_use_in_teaching' => $faker->text(30),
        'cities_id'=> $faker->numberBetween(1, \App\models\City::all()->count()),
        'schools_id'=> $faker->numberBetween(1, \App\models\School::all()->count()),
        'users_id'=> $faker->numberBetween(6, \App\models\User::all()->count()),
    ];
});




