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

$teacher_names=['Agélii Genlott Annika','Anna Carlsson','Catherine Mortimer-Hawkins','Cecilia Gustavsson','Ditte O\'Connor'];
$factory->define(\App\Models\Teacher::class, function (Faker $faker) use ($teacher_names){
    return [
        'name' => $faker->unique()->randomElement($teacher_names),
    ];
});


$factory->define(\App\Models\TeacherCourse::class, function (Faker $faker){
    return [
        'teachers_id' => $faker->unique()->numberBetween(1, \App\models\Teacher::all()->count()),
        'courses_id' => $faker->unique()->numberBetween(1, \App\models\Course::all()->count()),
        'users_id'=> $faker->unique()->numberBetween(1, \App\models\User::all()->count()),
    ];
});

$factory->define(\App\Models\AssignmentDescription::class, function (Faker $faker){
    return [
        'case' => $faker->text(15),
        'instructions' => $faker->text(35),
        'startdate' => $faker->date('Y-m-d'),
        'deadline'=> $faker->date('Y-m-d'),
        'available_date'=> $faker->date('Y-m-d'),
        'teacher_courses_id' => $faker->unique()->numberBetween(1, \App\models\TeacherCourse::all()->count()),
    ];
});

/*
  $factory->define(\App\Models\AssignmentNotifications::class, function (Faker $faker){
    return [
        'message' =>$faker->text(60),
        'status' => $faker->boolean()->numberBetween(1, \App\models\Course::all()->count()),
        'users_id'=> $faker->unique()->numberBetween(1, \App\models\User::all()->count()),
    ];
});
 */